<?php

declare(strict_types=1);

namespace Mintellity\BladeComponents\Traits;

use Livewire\WithPagination;

/**
 * Trait for LiveWire components to add sorting functionality.
 */
trait WithSorting
{
    use WithBaseSorting, WithPagination;

    /**
     * The url path where the e.g. table is located.
     */
    public string $componentPath = '';

    /**
     * Store the component url path and set default sorting.
     */
    public function mountWithSorting(): void
    {
        $this->componentPath = request()->route()->uri;

        if (request('sortBy') === null) {
            $this->sortBy = $this->getDefaultSortBy();
        }

        if (request('sortDirection') === null) {
            $this->sortDirection = $this->getDefaultSortDirection();
        }
    }

    /**
     * Get the query string for sorting.
     */
    public function queryStringWithSorting(): array
    {
        return [
            'sortBy' => ['except' => $this->getDefaultSortBy()],
            'sortDirection' => ['except' => $this->getDefaultSortDirection()],
        ];
    }

    /**
     * Check if the sorting is valid. If not, reset the sorting.
     */
    public function renderingWithSorting(): void
    {
        if (! $this->isValidSortBy($this->sortBy)) {
            $this->resetSort();
        }
    }

    /**
     * Reset pagination.
     */
    public function updatedSort(): void
    {
        // Reset the page to 1.
        $this->resetPage();
    }
}
