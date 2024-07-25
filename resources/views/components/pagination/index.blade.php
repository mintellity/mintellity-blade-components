@php
    /** @var \Illuminate\Contracts\Pagination\Paginator $paginator */
@endphp

@if ($paginator->hasPages())
    <nav role="navigation" class="d-flex justify-content-between row">
        <div class="col-sm-12 col-md-6">
            <p class="small text-muted">
                Zeige
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                bis
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                von
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                Einträgen
            </p>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="paging_simple_numbers">
                <ul class="pagination">
                    @if($paginator->onFirstPage())
                        <li class="paginate_button page-item previous disabled">
                            <a aria-disabled="true" role="link" tabindex="-1" class="page-link">
                                Zurück
                            </a>
                        </li>
                    @else
                        <li class="paginate_button page-item previous">
                            <a href="{{ $paginator->previousPageUrl() }}" tabindex="0" class="page-link">
                                Zurück
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="paginate_button page-item disabled">
                                <a aria-disabled="true" role="link" tabindex="-1" class="page-link">
                                    {{ $element }}
                                </a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="{{ $url }}"
                                           role="link"
                                           aria-current="page"
                                           tabindex="0"
                                           class="page-link">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}"
                                           role="link"
                                           aria-current="page"
                                           tabindex="0"
                                           class="page-link">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item next">
                            <a href="{{ $paginator->nextPageUrl() }}" tabindex="0" class="page-link">
                                Zurück
                            </a>
                        </li>
                    @else
                        <li class="paginate_button page-item next">
                            <a aria-disabled="true" role="link" tabindex="-1" class="page-link">
                                Nächste
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
