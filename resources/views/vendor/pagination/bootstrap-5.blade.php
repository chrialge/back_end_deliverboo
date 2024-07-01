@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-md-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    {{-- <li class="page_item disabled" aria-disabled="true">
                        <span class="page_link">
                            <i class="fa-solid fa-chevron-left"></i>
                            first page
                        </span>
                    </li> --}}
                @else
                    <a class="page_link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <li class="page_item">
                            <i class="fa-solid fa-chevron-left"></i>
                        </li>
                    </a>
                @endif

                @if ($paginator->currentPage())
                    <li class="page_current" aria-current="page"><span
                            class="active_page">{{ $paginator->currentPage() }}</span></li>
                @endif


                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="page_link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <li class="page_item">
                            <i class="fa-solid fa-chevron-right"></i>


                        </li>
                    </a>
                @else
                    {{-- <li class="page_item disabled" aria-disabled="true">
                        <span class="page_link">
                            Last page
                        </span>
                    </li> --}}
                @endif
            </ul>
        </div>

        <div class="d-none flex-md-fill d-md-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('da') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('a') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('su') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('risultati') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    @else
                        <a class="page_link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">
                            <li class="page_item">
                                <i class="fa-solid fa-chevron-left"></i>
                            </li>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}

                    @foreach (array_chunk($elements[0], 4, true) as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page_item disabled" aria-disabled="true"><span
                                    class="page_link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        {{-- @dd($element) --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page_item" aria-current="page"><span
                                            class="active_page">{{ $page }}</span></li>
                                @else
                                    <a class="page_link" href="{{ $url }}">
                                        <li class="page_item">
                                            {{ $page }}
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach



                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a class="page_link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">
                            <li class="page_item">
                                <i class="fa-solid fa-chevron-right"></i>
                            </li>
                        </a>
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
