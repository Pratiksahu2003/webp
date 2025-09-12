<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::with('user')->latest();

        // Filter by type
        if ($request->type) {
            switch ($request->type) {
                case 'images':
                    $query->images();
                    break;
                case 'videos':
                    $query->videos();
                    break;
                case 'documents':
                    $query->documents();
                    break;
            }
        }

        // Filter by folder
        if ($request->folder) {
            $query->inFolder($request->folder);
        }

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('original_name', 'like', '%' . $request->search . '%')
                  ->orWhere('alt_text', 'like', '%' . $request->search . '%');
            });
        }

        $media = $query->paginate(24);
        $folders = Media::distinct('folder')->whereNotNull('folder')->pluck('folder');

        return view('admin.media.index', compact('media', 'folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // 10MB max
            'folder' => 'nullable|string|max:255'
        ]);

        $uploadedFiles = [];

        foreach ($request->file('files', []) as $file) {
            $media = $this->storeFile($file, $request->folder);
            $uploadedFiles[] = $media;
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($uploadedFiles) . ' file(s) uploaded successfully.',
                'files' => $uploadedFiles
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', count($uploadedFiles) . ' file(s) uploaded successfully.');
    }

    public function show(Media $media)
    {
        return response()->json($media);
    }

    public function update(Request $request, Media $media)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'folder' => 'nullable|string|max:255'
        ]);

        $media->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Media updated successfully.',
                'media' => $media
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', 'Media updated successfully.');
    }

    public function destroy(Media $media)
    {
        // Delete file from storage
        Storage::disk($media->disk)->delete($media->path);
        
        // Delete record
        $media->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Media deleted successfully.'
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', 'Media deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id'
        ]);

        $mediaItems = Media::whereIn('id', $request->media_ids)->get();

        foreach ($mediaItems as $media) {
            Storage::disk($media->disk)->delete($media->path);
            $media->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($mediaItems) . ' file(s) deleted successfully.'
        ]);
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $folderName = Str::slug($request->name);

        return response()->json([
            'success' => true,
            'message' => 'Folder created successfully.',
            'folder' => $folderName
        ]);
    }

    private function storeFile($file, $folder = null)
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getMimeType();
        $size = $file->getSize();

        // Generate unique filename
        $filename = Str::uuid() . '.' . $extension;
        
        // Determine storage path
        $path = $folder ? "media/{$folder}/{$filename}" : "media/{$filename}";
        
        // Store file
        $storedPath = Storage::disk('public')->putFileAs(
            dirname($path),
            $file,
            basename($path)
        );

        // Get image dimensions if it's an image
        $metadata = [];
        if (Str::startsWith($mimeType, 'image/')) {
            try {
                $imageSize = getimagesize($file->getPathname());
                if ($imageSize) {
                    $metadata = [
                        'width' => $imageSize[0],
                        'height' => $imageSize[1]
                    ];
                }
            } catch (\Exception $e) {
                // Ignore errors
            }
        }

        // Create media record
        return Media::create([
            'name' => pathinfo($originalName, PATHINFO_FILENAME),
            'original_name' => $originalName,
            'path' => $storedPath,
            'disk' => 'public',
            'mime_type' => $mimeType,
            'size' => $size,
            'extension' => $extension,
            'metadata' => $metadata,
            'folder' => $folder,
            'user_id' => auth()->id()
        ]);
    }
}
