@if ($paginator->hasPages())

<nav class="pagination">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="page disabled">&lt;</span>
    @else
        <a class="page" href="{{ $paginator->previousPageUrl() }}">&lt;</a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)

        @if (is_string($element))
            <span class="dots">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)

                @if ($page == $paginator->currentPage())
                    <span class="page active">{{ $page }}</span>
                @else
                    <a class="page" href="{{ $url }}">{{ $page }}</a>
                @endif

            @endforeach
        @endif

    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a class="page" href="{{ $paginator->nextPageUrl() }}">&gt;</a>
    @else
        <span class="page disabled">&gt;</span>
    @endif

</nav>

@endif