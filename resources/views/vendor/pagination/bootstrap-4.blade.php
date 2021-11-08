@if ($paginator->hasPages())
    <nav >
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fas fa-arrow-circle-left"></i></a>
                </li>
            @endif

          

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item ms-4" >
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fas fa-arrow-circle-right"></i></a>
                </li>
            @else
                <li class="page-item disabled ms-4" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
