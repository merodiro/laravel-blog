@if ($paginator->hasPages())
    <ul class="pager">
        {{-- Previous Page Link --}}
        @unless ($paginator->onFirstPage())            
            <li class="previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; Newer Posts</a></li>
        @endunless

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Older Posts &rarr;</a></li>
        @endif
    </ul>
@endif
