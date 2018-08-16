@if ($paginator->hasPages())
    <ul class="pagination" style="margin:0px;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><span class="ms-btn-paginate" ms-live-link="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</span></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><span class="ms-mod-btn" ms-live-link="{{ $url }}">{{ $page }}</span></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><span class="ms-mod-btn" ms-live-link="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</span></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
