@props([
    'title',
    'active' => false,
    'id' => Str::random(8),
    'livewireIgnore' => true,
])

<div {{ $attributes->class("accordion-item") }}>
    <h2 class="accordion-header"
        id="heading-{{ $id }}">
        <button
            @class(['accordion-button accordion-button-flush', 'collapsed' => !$active])
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapse-{{ $id }}"
            aria-expanded="{{ json_encode($active) }}"
            aria-controls="collapse-{{ $id }}"
            @if($livewireIgnore) wire:ignore.self @endif>
            {{ $title }}
        </button>
    </h2>
    <div id="collapse-{{ $id }}"
         @class(['accordion-collapse collapse', 'show' => $active])
         aria-labelledby="heading-{{ $id }}"
         wire:ignore.self
         data-bs-parent="#{{ $accordionId }}"
         @if($livewireIgnore) wire:ignore.self @endif>
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
