@props([
    'sortBy' => null,
    'sortDirection',
    'sortLivewire' => true,
    'finalCol' => false
])

@if($sortBy && isset($this))
    @php
        if (!isset($sortDirection) && isset($this->sortBy, $this->sortDirection)) {
            if ($this->sortBy === $sortBy) {
                $sortDirection = $this->sortDirection;
            } else {
                $sortDirection = null;
            }
        }

        if ($sortLivewire) {
            $attributes = $attributes->merge(["wire:click" => "setSortBy('$sortBy')"]);
        }
    @endphp

    <th {{ $attributes->class(['cursor-pointer user-select-none' => $sortBy, 'text-primary' => $sortDirection, 'text-end' => $finalCol]) }}>
        @if ($sortBy)
            <span class="me-1">
            @switch ($sortDirection)
                    @case('asc')
                        <x-mint::icon name="arrow-up-long" style="width: 1rem;"/>
                        @break
                    @case('desc')
                        <x-mint::icon name="arrow-down-long" style="width: 1rem;"/>
                        @break
                    @default
                        <x-mint::icon name="arrow-right-arrow-left" style="width: 1rem; transform: rotate(90deg) scale(1.1);"/>
                @endswitch
        </span>
        @endif

        {{ $slot }}
    </th>

@else
    <th {{ $attributes->class(['text-end' => $finalCol]) }}>
        {{ $slot }}
    </th>
@endif
