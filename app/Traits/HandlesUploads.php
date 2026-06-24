<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesUploads
{
    protected function uploadFile(?UploadedFile $file, string $directory, ?string $existing = null): ?string
    {
        if (! $file) {
            return $existing;
        }

        if ($existing && Storage::disk('public')->exists($existing)) {
            Storage::disk('public')->delete($existing);
        }

        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        return $file->storeAs($directory, $filename, 'public');
    }

    protected function deleteFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
