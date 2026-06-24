@if(isset($blogPosts) && $blogPosts->isNotEmpty())
<x-home.section id="blog" tone="muted">
    <x-home.section-header
        badge="Insights"
        title="Latest from our blog"
        subtitle="Trends, guides, and perspectives on software development and digital growth."
    />

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach($blogPosts->take(3) as $post)
        <article class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            @if($post->featured_image)
            <a href="{{ route('blog.show', $post) }}" class="block aspect-[16/10] overflow-hidden bg-gray-100">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </a>
            @endif
            <div class="p-6">
                @if($post->category)
                <span class="text-xs font-semibold uppercase tracking-wide text-orange-600">{{ $post->category }}</span>
                @endif
                <h3 class="mt-2 text-lg font-bold text-gray-900 leading-snug group-hover:text-orange-600 transition-colors">
                    <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                </h3>
                @if($post->excerpt)
                <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $post->excerpt }}</p>
                @endif
                <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center mt-4 text-sm font-semibold text-orange-600 hover:text-orange-700">
                    Read article
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700">
            View all articles
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</x-home.section>
@endif
