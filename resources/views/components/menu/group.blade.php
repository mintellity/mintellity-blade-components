@props([
    'title' => null,
    'icon' => null,
    'active' => null,
])

@php
    if (is_callable($active))
         $active = $active() === true;

    if (is_string($active) || is_array($active))
        $active = request()->routeIs($active);
@endphp

<li @class(["menu-item", "active open" => $active])>
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        @if($icon)
            @if(is_string($icon))
                <x-mint::icon class="menu-icon" :name="$icon" />
            @else
                {{ $icon }}
            @endif
        @endif
        <div>{{ $title }}</div>
    </a>

    <ul class="menu-sub">
        {{ $slot }}
    </ul>
</li>
