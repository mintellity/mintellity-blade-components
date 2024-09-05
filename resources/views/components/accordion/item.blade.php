@props([
    'hostId',
    'id' => Str::random(8),
    'title',
    'active' => false,
    'icon' => false,
    'livewireIgnore' => true,
    'noSync' => false
])

@php
    $headerAttributes = $attributes->prefixed('header');
    $bodyAttributes = $attributes->prefixed('body');
    $groupAttributes = $attributes->notPrefixed(['header', 'body']);
@endphp

<div {{ $attributes->class(['accordion-item', 'card', 'active' => $active]) }}>
    <h2 {{ $headerAttributes->class('accordion-header')->except(['id']) }}
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
                <x-mint::icon name="{{$icon}}" class="me-2"/>
            @endif
            {{ $title }}
        </button>
    </h2>
    <div id="collapse-{{ $id }}"
         {{ $bodyAttributes->class(['accordion-collapse collapse', 'show' => $active])->except(['id']) }}
         aria-labelledby="heading-{{ $id }}"
         @if(!$noSync) data-bs-parent="#{{ $hostId }}" @endif
         @if($livewireIgnore) wire:ignore.self @endif>
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
