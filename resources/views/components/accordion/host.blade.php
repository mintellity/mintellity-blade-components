<div {{ $attributes->class(['accordion'])->except('id') }} id="{{ $accordionId ?? '' }}">
    {{ $slot }}
</div>

@php
    View::share('accordionId');
@endphp
