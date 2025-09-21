        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Post Details
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            SEO Score
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author & Category
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Performance
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($blogPosts as $post)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" value="{{ $post->id }}" class="post-checkbox rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        </td>
                        
                        <!-- Post Details -->
                        <td class="px-6 py-4">
                            <div class="flex items-start space-x-4">
                                <!-- Featured Image -->
                                <div class="flex-shrink-0 h-16 w-24">
                                    @if($post->featured_image)
                                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="h-16 w-24 rounded-lg object-cover">
                                    @else
                                        <div class="h-16 w-24 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Post Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-900 hover:text-blue-600 cursor-pointer">
                                                <a href="{{ route('admin.blog-posts.edit', $post) }}">{{ $post->title }}</a>
                                            </h4>
                                            @if($post->excerpt)
                                                <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ Str::limit($post->excerpt, 80) }}</p>
                                            @endif
                                            
                                            <!-- Meta Info -->
                                            <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                                                <span class="flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $post->reading_time_formatted }}
                                                </span>
                                                <span class="flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    {{ number_format($post->views) }} views
                                                </span>
                                                <span>{{ number_format($post->word_count) }} words</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Featured Badge -->
                                        @if($post->is_featured)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                Featured
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <!-- SEO Score -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex items-center space-x-2">
                                    <!-- SEO Score Circle -->
                                    <div class="relative w-12 h-12">
                                        <svg class="w-12 h-12 transform -rotate-90" viewBox="0 0 48 48">
                                            <circle cx="24" cy="24" r="20" stroke="#e5e7eb" stroke-width="4" fill="transparent"></circle>
                                            <circle cx="24" cy="24" r="20" 
                                                    stroke="{{ $post->seo_score >= 80 ? '#10b981' : ($post->seo_score >= 60 ? '#f59e0b' : '#ef4444') }}" 
                                                    stroke-width="4" 
                                                    fill="transparent"
                                                    stroke-dasharray="{{ 2 * pi() * 20 }}"
                                                    stroke-dashoffset="{{ 2 * pi() * 20 * (1 - $post->seo_score / 100) }}"
                                                    class="transition-all duration-300">
                                            </circle>
                                        </svg>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <span class="text-xs font-bold {{ $post->seo_score >= 80 ? 'text-green-600' : ($post->seo_score >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                                                {{ round($post->seo_score) }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- SEO Details -->
                                    <div>
                                        <div class="text-sm font-medium {{ $post->seo_score >= 80 ? 'text-green-600' : ($post->seo_score >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                                            {{ $post->seo_score >= 80 ? 'Excellent' : ($post->seo_score >= 60 ? 'Good' : 'Needs Work') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            @if($post->meta_title) ✓ @else ✗ @endif Meta Title
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            @if($post->meta_description) ✓ @else ✗ @endif Meta Desc
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <!-- Author & Category -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="space-y-2">
                                <!-- Author -->
                                <div class="flex items-center">
                                    <div class="h-6 w-6 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-xs font-bold text-white">{{ substr($post->author ?: 'A', 0, 1) }}</span>
                                    </div>
                                    <div class="text-sm text-gray-900">{{ $post->author ?: 'Unknown' }}</div>
                                </div>
                                
                                <!-- Category -->
                                @if($post->category)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $post->category }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        
                        <!-- Status -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="space-y-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $post->status_color }}-100 text-{{ $post->status_color }}-800">
                                    <span class="w-1.5 h-1.5 bg-{{ $post->status_color }}-400 rounded-full mr-1.5"></span>
                                    {{ $post->status_label }}
                                </span>
                                
                                <!-- Date Info -->
                                <div class="text-xs text-gray-500">
                                    @if($post->status === 'published' && $post->published_at)
                                        Published {{ $post->published_at->format('M d, Y') }}
                                    @elseif($post->status === 'scheduled' && $post->scheduled_at)
                                        Scheduled {{ $post->scheduled_at->format('M d, Y') }}
                                    @else
                                        Created {{ $post->created_at->format('M d, Y') }}
                                    @endif
                                </div>
                            </div>
                        </td>
                        
                        <!-- Performance -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="space-y-1">
                                <!-- Views -->
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <span class="text-gray-900">{{ number_format($post->views) }}</span>
                                </div>
                                
                                <!-- Focus Keywords -->
                                @if($post->focus_keywords && count($post->focus_keywords) > 0)
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        {{ count($post->focus_keywords) }} keywords
                                    </div>
                                @endif
                            </div>
                        </td>
                        
                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <!-- Preview -->
                                <a href="{{ route('admin.blog-posts.preview', $post) }}" 
                                   target="_blank"
                                   class="text-gray-400 hover:text-gray-600 p-1"
                                   title="Preview">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                
                                <!-- Edit -->
                                <a href="{{ route('admin.blog-posts.edit', $post) }}" 
                                   class="text-blue-600 hover:text-blue-900 p-1"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <!-- Duplicate -->
                                <a href="{{ route('admin.blog-posts.duplicate', $post) }}" 
                                   class="text-green-600 hover:text-green-900 p-1"
                                   title="Duplicate">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </a>
                                
                                <!-- Delete -->
                                <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 p-1"
                                            title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                @if(request()->hasAny(['search', 'status', 'category', 'featured']))
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No blog posts match your filters</h3>
                                    <p class="text-gray-500 mb-4">Try adjusting your search criteria or clear the filters.</p>
                                    <a href="{{ route('admin.blog-posts.index') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                        Clear Filters
                                    </a>
                                @else
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No blog posts found</h3>
                                    <p class="text-gray-500 mb-4">Start by creating your first blog post with SEO optimization.</p>
                                    <a href="{{ route('admin.blog-posts.create') }}" 
                                       class="zoho-btn zoho-btn-primary">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Create First Post
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($blogPosts->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $blogPosts->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Bulk Actions Form -->
<form id="bulk-actions-form" action="{{ route('admin.blog-posts.bulk-action') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="action" id="bulk-action-input">
    <input type="hidden" name="selected_posts" id="selected-posts-input">
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select All functionality
    const selectAllCheckbox = document.getElementById('select-all');
    const postCheckboxes = document.querySelectorAll('.post-checkbox');
    const bulkActionsDiv = document.getElementById('bulk-actions');
    const selectedCountSpan = document.getElementById('selected-count');

    selectAllCheckbox.addEventListener('change', function() {
        postCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkActions();
    });

    postCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActions);
    });

    function updateBulkActions() {
        const selectedCheckboxes = document.querySelectorAll('.post-checkbox:checked');
        const selectedCount = selectedCheckboxes.length;
        
        if (selectedCount > 0) {
            bulkActionsDiv.classList.remove('hidden');
            bulkActionsDiv.classList.add('flex');
            selectedCountSpan.textContent = `${selectedCount} selected`;
        } else {
            bulkActionsDiv.classList.add('hidden');
            bulkActionsDiv.classList.remove('flex');
        }
    }
});

function executeBulkAction() {
    const action = document.getElementById('bulk-action-select').value;
    const selectedCheckboxes = document.querySelectorAll('.post-checkbox:checked');
    
    if (!action) {
        alert('Please select an action');
        return;
    }
    
    if (selectedCheckboxes.length === 0) {
        alert('Please select posts to perform the action on');
        return;
    }
    
    const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value);
    
    if (action === 'delete' && !confirm(`Are you sure you want to delete ${selectedIds.length} blog posts?`)) {
        return;
    }
    
    document.getElementById('bulk-action-input').value = action;
    document.getElementById('selected-posts-input').value = JSON.stringify(selectedIds);
    document.getElementById('bulk-actions-form').submit();
}

function toggleTableView(view) {
    // Implementation for grid/list view toggle
    console.log('Toggle view to:', view);
}

function showBulkActions() {
    alert('Select posts using checkboxes to see bulk actions');
}
</script>

@endsection
