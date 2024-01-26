@props([
    'title',
    'active' => false,
    'id' => Str::random(8),
    'accordionId',
    'icon' => false,
    'livewireIgnore' => true,
    'noSync' => false
])

<div {{ $attributes->class(['accordion-item', 'active' => $active]) }}>
    <h2 class="accordion-header"
        id="heading-{{ $id }}">
        <button
            @class(['accordion-button', 'collapsed' => !$active])
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapse-{{ $id }}"
            aria-expanded="{{ json_encode($active) }}"
            aria-controls="collapse-{{ $id }}"
            @if($livewireIgnore) wire:ignore.self @endif>
            @if($icon)
                <x-mint::icon name="{{$icon}}" class="me-2" />
            @endif
            {{ $title }}
        </button>
    </h2>
    <div id="collapse-{{ $id }}"
         @class(['accordion-collapse collapse', 'show' => $active])
         aria-labelledby="heading-{{ $id }}"
         wire:ignore.self
         @if(!$noSync)
             data-bs-parent="#{{ $accordionId }}"
         @endif
         @if($livewireIgnore) wire:ignore.self @endif>
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
