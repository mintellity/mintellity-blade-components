<?php

declare(strict_types=1);

namespace Mintellity\BladeComponents\Traits;

use Livewire\WithPagination;

/**
 * Trait for LiveWire components to add sorting functionality.
 */
trait WithSessionSorting
{
    use WithBaseSorting, WithPagination;

    /**
     * The url path where the e.g. table is located.
     */
    public string $componentPath = '';

    /**
     * Store the component url path.
     */
    public function mountWithSessionSorting(): void
    {
        $this->componentPath = request()->route()->uri;

        if (request('resetSorting')) {
            $this->resetSort();
        }

        $this->sortBy = session()
            ->get("sessionSorting.$this->componentPath.sortBy", $this->getDefaultSortBy());

        $this->sortDirection = session()
            ->get("sessionSorting.$this->componentPath.sortDirection", $this->getDefaultSortDirection());

        $page = session("sessionSorting.$this->componentPath.page");

        // Only set page if it's not in the URL.
        if ($page !== null && request('page') === null) {
            $this->setPage(session("sessionSorting.$this->componentPath.page"));
        } else {
            session()->put("sessionSorting.$this->componentPath.page", $this->getPage());
        }
    }

    /**
     * Check if the sorting is valid. If not, reset the sorting.
     */
    public function renderingWithSessionSorting(): void
    {
        if (!$this->isValidSortBy($this->sortBy)) {
            $this->resetSort();
        }
    }

    /**
     * Store the sorting in the session.
     */
    public function updatedSort(): void
    {
        session()->put("sessionSorting.$this->componentPath.sortBy", $this->sortBy);
        session()->put("sessionSorting.$this->componentPath.sortDirection", $this->sortDirection);

        // Reset the page to 1.
        $this->resetPage();
    }

    /**
     * Store the page in the session.
     */
    public function updatedPage($page): void
    {
        session()->put("sessionSorting.$this->componentPath.page", $page);
    }
}
