<?php

declare(strict_types=1);

namespace Mintellity\BladeComponents\Traits;

/**
 * @property string $sortBy The field to sort by.
 * @property string $sortDirection The sort direction ('asc' or 'desc')
 * @property string $defaultSortBy The default field to sort by.
 * @property string $defaultSortDirection The default sort direction ('asc' or 'desc')
 * @property-read string|array $sortableColumns Restrict sorting to these columns.
 */
trait WithBaseSorting
{
    /**
     * The field to sort by.
     */
    public ?string $sortBy = null;

    /**
     * The sort direction ('asc' or 'desc')
     */
    public string $sortDirection = 'asc';

    /**
     * On-Click:
     * - Sort the results by the given field.
     * - Reset page to 1.
     */
    public function setSortBy(string $field): void
    {
        // If the field is already sorted, reverse the direction.
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;

        if (method_exists($this, 'updatedSort')) {
            $this->updatedSort();
        }
    }

    /**
     * Reset the sorting.
     */
    public function resetSort(): void
    {
        $this->sortBy = $this->getDefaultSortBy();
        $this->sortDirection = $this->getDefaultSortDirection();

        if (method_exists($this, 'updatedSort')) {
            $this->updatedSort();
        }
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortBy(): ?string
    {
        if (property_exists($this, 'defaultSortBy')) {
            return $this->defaultSortBy;
        }

        return null;
    }

    /**
     * Get the default sort column.
     */
    protected function getDefaultSortDirection(): ?string
    {
        if (property_exists($this, 'defaultSortDirection')) {
            return $this->defaultSortDirection;
        }

        return 'asc';
    }

    /**
     * Whether the given field is a valid field to sort by.
     */
    protected function isValidSortBy(?string $field): bool
    {
        if ($field === null) {
            return true;
        }

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
}
