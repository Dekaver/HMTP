@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="">
        <div class="col bg-white">
            @if ($paginator->onFirstPage())
                <span>
                    <i class="bx bx-first-page"></i>
                </span>
                <span>
                    <i class="bx bx-chevrons-left"></i>
                </span>
            @else
                <a href="{{ $paginator->url(1) }}" >
                    <i class="bx bx-first-page"></i>
                </a>
                <a href="{{ $paginator->previousPageUrl() }}" >
                    <i class="bx bx-chevrons-left"></i>
                </a>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span class="mb-2">[{{ $page }}]</span>
                            </span>
                        @else
                            <a href="{{ $url }}" style="margin-bottom: 12px" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" >
                    <i class="bx bx-chevrons-right"></i>
                </a>
                <a href="{{ $paginator->url($paginator->lastPage()) }}" >
                    <i class="bx bx-last-page"></i>
                </a>
            @else
                <span>
                    <i class="bx bx-chevrons-right"></i>
                </span>
                <span>
                    <i class="bx bx-last-page"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
