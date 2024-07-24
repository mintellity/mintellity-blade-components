<?php

namespace Mintellity\BladeComponents\Traits;

/**
 * Trait for LiveWire components to add sorting functionality.
 *
 * @property string $sortBy The field to sort by.
 * @property string $sortDirection The sort direction ('asc' or 'desc')
 * @property-read string|array $sortableColumns Restrict sorting to these columns.
 * @property string $defaultSortBy The default field to sort by.
 * @property string $defaultSortDirection The default sort direction ('asc' or 'desc')
 */
trait WithSorting
{
    /**
     * The field to sort by.
     */
    public string $sortBy = 'created_at';

    /**
     * The sort direction ('asc' or 'desc')
     */
    public string $sortDirection = 'asc';

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
    }

    /**
     * Reset the sorting.
     */
    public function resetSort(): void
    {
        $this->sortBy = $this->getDefaultSortBy();
        $this->sortDirection = $this->getDefaultSortDirection();
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortBy(): string
    {
        if (property_exists($this, 'defaultSortBy')) {
            return $this->defaultSortBy;
        }

        return 'created_at';
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortDirection(): string
    {
        if (property_exists($this, 'defaultSortDirection')) {
            return $this->defaultSortDirection;
        }

        return 'asc';
    }
}
