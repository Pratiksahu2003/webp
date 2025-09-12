@extends('layouts.admin')

@section('page-title', 'Media Library')

@section('content')
<div x-data="mediaManager()" class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Media Library</h1>
            <p class="text-gray-600 mt-1">Manage your images, videos, and documents</p>
        </div>
        <div class="flex items-center space-x-3">
            <button @click="showCreateFolder = true" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Folder
            </button>
            <button @click="$refs.fileInput.click()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Upload Files
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <div class="relative">
                    <input x-model="searchQuery" type="text" placeholder="Search files..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">File Type</label>
                <select x-model="typeFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Types</option>
                    <option value="images">Images</option>
                    <option value="videos">Videos</option>
                    <option value="documents">Documents</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Folder</label>
                <select x-model="folderFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Folders</option>
                    @foreach($folders as $folder)
                        <option value="{{ $folder }}">{{ ucfirst($folder) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">View</label>
                <div class="flex rounded-lg border border-gray-300 overflow-hidden">
                    <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'" class="flex-1 px-3 py-2 text-sm transition-colors">
                        <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                    <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'" class="flex-1 px-3 py-2 text-sm transition-colors">
                        <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-end">
                <button @click="resetFilters()" class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Clear
                </button>
            </div>
        </div>
    </div>

    <!-- Selection Actions -->
    <div x-show="selectedFiles.length > 0" x-transition class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <span class="text-blue-800" x-text="`${selectedFiles.length} file${selectedFiles.length > 1 ? 's' : ''} selected`"></span>
            <div class="flex items-center space-x-3">
                <button @click="bulkDelete()" class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                    Delete Selected
                </button>
                <button @click="selectedFiles = []" class="px-3 py-1 bg-gray-600 text-white rounded text-sm hover:bg-gray-700">
                    Clear Selection
                </button>
            </div>
        </div>
    </div>

    <!-- Media Grid/List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <!-- Grid View -->
        <div x-show="viewMode === 'grid'" class="p-6">
            @if($media->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
                    @foreach($media as $file)
                    <div x-data="{ file: {{ $file->toJson() }} }" class="group relative bg-gray-50 rounded-lg overflow-hidden hover:bg-gray-100 transition-colors cursor-pointer" @click="selectFile(file)">
                        <!-- File Preview -->
                        <div class="aspect-square flex items-center justify-center p-4">
                            @if($file->is_image)
                                <img src="{{ $file->url }}" alt="{{ $file->alt_text }}" class="w-full h-full object-cover rounded">
                            @elseif($file->is_video)
                                <div class="w-full h-full bg-gray-800 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-full h-full bg-blue-100 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- File Info -->
                        <div class="p-2">
                            <p class="text-xs font-medium text-gray-900 truncate">{{ $file->name }}</p>
                            <p class="text-xs text-gray-500">{{ $file->human_size }}</p>
                        </div>

                        <!-- Selection Checkbox -->
                        <div class="absolute top-2 left-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <input type="checkbox" :value="file.id" x-model="selectedFiles" @click.stop class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </div>

                        <!-- Actions -->
                        <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <div x-data="{ dropdownOpen: false }" class="relative">
                                <button @click.stop="dropdownOpen = !dropdownOpen" class="p-1 bg-white rounded-full shadow-sm hover:bg-gray-100">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 z-20">
                                    <div class="py-1">
                                        <button @click="editFile(file)" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Edit Details
                                        </button>
                                        <button @click="copyUrl(file.url)" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Copy URL
                                        </button>
                                        <a :href="file.url" target="_blank" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            View Full Size
                                        </a>
                                        <hr class="my-1">
                                        <button @click="deleteFile(file.id)" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No files found</h3>
                    <p class="text-gray-600 mb-4">Upload your first file to get started.</p>
                    <button @click="$refs.fileInput.click()" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Upload Files
                    </button>
                </div>
            @endif
        </div>

        <!-- List View -->
        <div x-show="viewMode === 'list'" class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" @change="toggleSelectAll()" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modified</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($media as $file)
                    <tr x-data="{ file: {{ $file->toJson() }} }" class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <input type="checkbox" :value="file.id" x-model="selectedFiles" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="w-10 h-10 flex items-center justify-center">
                                @if($file->is_image)
                                    <img src="{{ $file->url }}" alt="{{ $file->alt_text }}" class="w-10 h-10 object-cover rounded">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $file->name }}</div>
                            <div class="text-sm text-gray-500">{{ $file->original_name }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ strtoupper($file->extension) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $file->human_size }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $file->updated_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div x-data="{ dropdownOpen: false }" class="relative inline-block text-left">
                                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                                    Actions
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1">
                                        <button @click="editFile(file)" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Edit Details
                                        </button>
                                        <button @click="copyUrl(file.url)" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Copy URL
                                        </button>
                                        <a :href="file.url" target="_blank" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            View Full Size
                                        </a>
                                        <hr class="my-1">
                                        <button @click="deleteFile(file.id)" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($media->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $media->appends(request()->query())->links() }}
        </div>
        @endif
    </div>

    <!-- Hidden File Input -->
    <input type="file" x-ref="fileInput" multiple @change="uploadFiles($event)" class="hidden" accept="image/*,video/*,application/pdf,.doc,.docx,.xls,.xlsx">

    <!-- Create Folder Modal -->
    <div x-show="showCreateFolder" x-transition class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Create New Folder</h3>
                <input x-model="newFolderName" type="text" placeholder="Folder name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <div class="flex justify-end space-x-3 mt-4">
                    <button @click="showCreateFolder = false" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button @click="createFolder()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Create
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit File Modal -->
    <div x-show="showEditModal" x-transition class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3" x-show="editingFile">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit File Details</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input x-model="editingFile.name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alt Text</label>
                        <input x-model="editingFile.alt_text" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea x-model="editingFile.description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <button @click="showEditModal = false" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button @click="saveFileEdit()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function mediaManager() {
    return {
        searchQuery: '',
        typeFilter: '',
        folderFilter: '',
        viewMode: 'grid',
        selectedFiles: [],
        showCreateFolder: false,
        showEditModal: false,
        newFolderName: '',
        editingFile: null,
        
        resetFilters() {
            this.searchQuery = '';
            this.typeFilter = '';
            this.folderFilter = '';
        },
        
        toggleSelectAll() {
            // Implementation for select all
        },
        
        selectFile(file) {
            if (this.selectedFiles.includes(file.id)) {
                this.selectedFiles = this.selectedFiles.filter(id => id !== file.id);
            } else {
                this.selectedFiles.push(file.id);
            }
        },
        
        async uploadFiles(event) {
            const files = Array.from(event.target.files);
            const formData = new FormData();
            
            files.forEach(file => {
                formData.append('files[]', file);
            });
            
            if (this.folderFilter) {
                formData.append('folder', this.folderFilter);
            }
            
            try {
                const response = await fetch('{{ route("admin.media.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error uploading files: ' + data.message);
                }
            } catch (error) {
                alert('An error occurred during upload.');
            }
        },
        
        async createFolder() {
            if (!this.newFolderName.trim()) return;
            
            try {
                const response = await fetch('{{ route("admin.media.create-folder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        name: this.newFolderName
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    this.showCreateFolder = false;
                    this.newFolderName = '';
                    location.reload();
                } else {
                    alert('Error creating folder: ' + data.message);
                }
            } catch (error) {
                alert('An error occurred while creating folder.');
            }
        },
        
        editFile(file) {
            this.editingFile = { ...file };
            this.showEditModal = true;
        },
        
        async saveFileEdit() {
            try {
                const response = await fetch(`/admin/media/${this.editingFile.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        name: this.editingFile.name,
                        alt_text: this.editingFile.alt_text,
                        description: this.editingFile.description
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    this.showEditModal = false;
                    location.reload();
                } else {
                    alert('Error updating file: ' + data.message);
                }
            } catch (error) {
                alert('An error occurred while updating file.');
            }
        },
        
        async deleteFile(fileId) {
            if (!confirm('Are you sure you want to delete this file?')) return;
            
            try {
                const response = await fetch(`/admin/media/${fileId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error deleting file: ' + data.message);
                }
            } catch (error) {
                alert('An error occurred while deleting file.');
            }
        },
        
        async bulkDelete() {
            if (!confirm(`Are you sure you want to delete ${this.selectedFiles.length} file(s)?`)) return;
            
            try {
                const response = await fetch('{{ route("admin.media.bulk-delete") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        media_ids: this.selectedFiles
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error deleting files: ' + data.message);
                }
            } catch (error) {
                alert('An error occurred while deleting files.');
            }
        },
        
        copyUrl(url) {
            navigator.clipboard.writeText(url).then(() => {
                alert('URL copied to clipboard!');
            });
        }
    }
}
</script>
@endsection
