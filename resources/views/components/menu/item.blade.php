@props([
    'href' => '#',
    'active' => null,
    'icon' => null,
])

@php
    if (is_callable($active))
         $active = $active() === true;

    if (is_string($active) || is_array($active))
        $active = request()->routeIs($active);
@endphp

<li {{ $attributes->class(["menu-item", "active" => $active]) }}>
    <a href="{{ $href }}" class="menu-link">
        @if($icon)
            @if(is_string($icon))
                <x-mint::icon class="menu-icon" :name="$icon" />
            @else
                {{ $icon }}
            @endif
        @endif
        <div>{{ $slot }}</div>
    </a>
</li>
