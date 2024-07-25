@php
    if (! isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
@endphp

@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between mt-4 px-2" role="navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </li>
            @else
                @if(method_exists($paginator,'getCursorName'))
                    <li class="page-item">
                        <button
                            type="button"
                            class="page-link"
                            wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}"
                            wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled">
                            Vorherige
                        </button>
                    </li>
                @else
                    <li class="page-item">
                        <button
                            type="button"
                            class="page-link" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled">
                            Vorherige
                        </button>
                    </li>
                @endif
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                @if(method_exists($paginator,'getCursorName'))
                    <li class="page-item">
                        <button
                            type="button"
                            class="page-link"
                            wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}"
                            wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled">
                            Nächste
                        </button>
                    </li>
                @else
                    <li class="page-item">
                        <button
                            type="button"
                            class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled">
                            Nächste
                        </button>
                    </li>
                @endif
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
