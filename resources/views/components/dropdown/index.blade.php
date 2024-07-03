@props(['title'])

@php
    $btnAttrs = $attributes->prefixed('button');
    $btnGroupAttrs = $attributes->notPrefixed(['btn-group']);
@endphp

<div
    {{ $btnGroupAttrs->class("btn-group")->except('role') }}
    role="group">
    <button
        {{ $btnAttrs->class("btn btn-primary dropdown-toggle")->except(['type', 'data-bs-toggle', 'aria-expanded']) }}
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ $title }}
    </button>
    <ul class="dropdown-menu">
        {{ $slot }}
    </ul>
</div>
