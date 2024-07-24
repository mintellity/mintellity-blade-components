<?php

namespace Mintellity\BladeComponents\Traits;

use Livewire\WithPagination;

/**
 * Trait for LiveWire components to add sorting functionality.
 *
 * @property string $sortBy The field to sort by.
 * @property string $sortDirection The sort direction ('asc' or 'desc')
 * @property-read string|array $sortableColumns Restrict sorting to these columns.
 * @property bool $storeSortInSession Whether to store the sorting in the session.
 * @property string $defaultSortBy The default field to sort by.
 * @property string $defaultSortDirection The default sort direction ('asc' or 'desc')
 */
trait WithSorting
{
    use WithPagination {
        WithPagination::queryStringWithPagination as queryStringWithPaginationTrait;
    }

    /**
     * The field to sort by.
     */
    public string $sortBy = 'created_at';

    /**
     * The sort direction ('asc' or 'desc')
     */
    public string $sortDirection = 'asc';

    /**
     * The theme for the pagination.
     */
    protected string $paginationTheme = 'bootstrap';

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

        $this->sortBy = $this->getDefaultSortBy();
        $this->sortDirection = $this->getDefaultSortDirection();
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
     * Disable query string from pagination.
     */
    public function queryStringWithPagination(): array
    {
        return [];
    }

    /**
     * Get the query string for sorting (if not stored in the session).
     */
    public function queryStringWithSorting(): array
    {
        if (! $this->shouldStoreSortInSession()) {
            return [
                'sortBy' => ['except' => $this->getDefaultSortBy()],
                'sortDirection' => ['except' => $this->getDefaultSortDirection()],
                'page' => ['except' => 1],
            ];
        } else {
            return [];
        }
    }

    /**
     * Whether the given field is a valid field to sort by.
     */
    protected function isValidSortBy(string $field): bool
    {
        if (! property_exists($this, 'sortableColumns')) {
            return true;
        }

        if (is_string($this->sortableColumns) && ($this->sortableColumns === '*' || $this->sortableColumns === $field)) {
            return true;
        }

        if (is_array($this->sortableColumns) && in_array($field, $this->sortableColumns)) {
            return true;
        }

        return false;
    }

    /**
     * On-Click:
     * - Sort the results by the given field.
     * - Reset page to 1.
     * - Store the sorting in the session.
     */
    public function sortBy(string $field): void
    {
        // If the field is already sorted, reverse the direction.
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;

        // Reset the page to 1.
        $this->resetPage();

        // Store the sorting in the session.
        if ($this->shouldStoreSortInSession()) {
            session([
                $this->getSessionKey('by') => $this->sortBy,
                $this->getSessionKey('direction') => $this->sortDirection,
            ]);
        }
    }

    /**
     * Reset the sorting.
     */
    public function resetSort(): void
    {
        $this->sortBy = $this->getDefaultSortBy(true);
        $this->sortDirection = $this->getDefaultSortDirection(true);
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortBy(bool $skipSession = false): string
    {
        if (! $skipSession && session()->has($this->getSessionKey('by'))) {
            return session($this->getSessionKey('by'));
        }

        if (property_exists($this, 'defaultSortBy')) {
            return $this->defaultSortBy;
        }

        return 'created_at';
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortDirection(bool $skipSession = false): string
    {
        if (! $skipSession && session()->has($this->getSessionKey('direction'))) {
            return session($this->getSessionKey('direction'));
        }

        if (property_exists($this, 'defaultSortDirection')) {
            return $this->defaultSortDirection;
        }

        return 'asc';
    }

    /**
     * Whether to store the sorting in the session.
     */
    public function shouldStoreSortInSession(): bool
    {
        return property_exists($this, 'storeSortInSession') ? $this->storeSortInSession : true;
    }

    /**
     * Get the session key for storing the sort column.
     */
    protected function getSessionKey(string $identifier): string
    {
        $class = get_class($this);

        return "sort_{$this->componentPath}_{$class}_{$identifier}";
    }
}
