@props(['items' => [], 'light' => false])

@if(count($items))
<nav aria-label="Breadcrumb" class="mb-6 lg:mb-8">
    <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm {{ $light ? 'text-slate-400' : 'text-gray-500' }}">
        @foreach($items as $index => $item)
            <li class="flex items-center gap-2 min-w-0">
                @if($index > 0)
                    <span class="{{ $light ? 'text-slate-600' : 'text-gray-300' }} select-none" aria-hidden="true">/</span>
                @endif
                @if(!empty($item['url']) && $index < count($items) - 1)
                    <a href="{{ $item['url'] }}" class="{{ $light ? 'text-slate-300 hover:text-white' : 'text-gray-500 hover:text-orange-600' }} transition-colors truncate max-w-[10rem] sm:max-w-none">{{ $item['label'] }}</a>
                @else
                    <span class="{{ $light ? 'text-white font-medium' : 'text-gray-900 font-medium' }} truncate max-w-[12rem] sm:max-w-xs lg:max-w-md" aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif
