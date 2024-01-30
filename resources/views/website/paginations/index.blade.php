<div class="pagination-area text-center">
    @if ($paginator->onFirstPage())
        <a class="prev page-numbers disabled" href="#"><i class="bx bx-chevron-left"></i></a>
    @else
        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="bx bx-chevron-left"></i></a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="page-numbers current" aria-current="page">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                @else
                    <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="bx bx-chevron-right"></i></a>
    @else
        <a class="next page-numbers disabled" href="#"><i class="bx bx-chevron-right"></i></a>
    @endif
</div>
