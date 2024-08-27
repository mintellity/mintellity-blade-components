@props([
    'tag' => null,
    'href' => null,
    'icon' => null,
    'color' => 'primary',
    'size' => null,
    'outline' => false,
    'label' => false,
    'rounded' => false,
    'square' => false,
])

@aware([
    'size' => null
])

@php
    $tag = $tag ?? $href ? 'a' : 'button';

    $attributes = $attributes->class([
        'btn',
        'btn-' . $color => ! $outline && ! $label,
        'btn-outline-' . $color => $outline,
        'btn-label-' . $color => $label,
        'btn-' . $size => $size,
        'btn-icon' => $square,
        'rounded-pill' => $rounded,
    ]);
@endphp

@if($tag === 'a')
    <a href="{{ $href }}" {{ $attributes }}>
        @if($icon)
            <x-mint::icon name="{{ $icon }}" class="me-2"/>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes }}>
        @if($icon)
            <x-mint::icon name="{{ $icon }}" class="me-2"/>
        @endif
        {{ $slot }}
    </button>
@endif
