@php
    /** @var \Illuminate\Contracts\Pagination\Paginator $paginator */
@endphp

@if ($paginator->hasPages())
    <nav role="navigation" class="d-flex justify-content-between row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_paginate paging_simple_numbers">
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
