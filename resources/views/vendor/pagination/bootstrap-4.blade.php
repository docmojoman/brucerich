@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li> --}}
            <li class="pagination-previous disabled">Previous <span class="show-for-sr">page</span></li>
        @else
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li> --}}
            <li class="pagination-previous"><a href="{{ $paginator->previousPageUrl() }}">Previous</a> <span class="show-for-sr">page</span></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{-- <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li> --}}
                <li class="ellipsis" aria-hidden="true">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}
                        <li class="current"><span class="show-for-sr">You're on page</span> {{ $page }}</li>
                    @else
                        {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> --}}
                        <li><a href="{{ $url }}" aria-label="Page {{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                {{-- <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a> --}}
                <li class="pagination-next"><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
            </li>
        @else
            {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span> --}}
                <li class="pagination-next disabled">Next <span class="show-for-sr">page</span></a></li>
            </li>
        @endif
    </ul>
@endif
