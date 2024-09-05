@props([
    'id'
])

<div {{ $attributes->class(['accordion accordion-header-primary'])->except('id') }} id="{{ $id ?? '' }}">
    {{ $slot }}
</div>
