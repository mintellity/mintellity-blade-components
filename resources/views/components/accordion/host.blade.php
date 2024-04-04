@props([
    'id'
])

<div {{ $attributes->class(['accordion'])->except('id') }} id="{{ $id ?? '' }}">
    {{ $slot }}
</div>

@php
    View::share('id');
@endphp
