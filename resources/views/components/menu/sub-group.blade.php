@props([
    'title' => null,
    'active' => null,
])

@php
    if (is_callable($active))
         $active = $active() === true;

    if (is_string($active) || is_array($active))
        $active = request()->routeIs($active);
@endphp

<li {{ $attributes->class(["menu-item", "active open" => $active]) }}>
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <div>{{ $title }}</div>
    </a>
    <ul class="menu-sub">
        {{ $slot }}
    </ul>
</li>
