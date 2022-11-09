@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-item first">
                    <a class="page-link" href="javascript:void(0);">
                        <i class="tf-icon bx bx-chevrons-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item prev">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <i class="tf-icon bx bx-chevrons-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    {{-- <li class="disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0);">{{ $element }}</a>
                    </li> --}}
                    <li class="page-item" class="disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0);">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="javascript:void(0);">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item next">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">
                        <i class="tf-icon bx bx-chevrons-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled page-item last" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link" href="javascript:void(0);">
                        <i class="tf-icon bx bx-chevrons-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
