@php
    /** @var \Illuminate\Contracts\Pagination\Paginator $paginator */
@endphp

@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between mt-4 px-2" role="navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        Vorherige
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        Vorherige
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        Nächste
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        Nächste
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
