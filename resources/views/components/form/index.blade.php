@props([
    'method' => 'POST',
    'action' => '/',
])

@php
    $formMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']) ? 'POST' : $method;
@endphp

<form
    action="{{ $action }}"
    method="{{ $formMethod }}"
    {{ $attributes->class('ajax-form')->merge(['enctype' => "multipart/form-data"]) }}>
    @csrf

    @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    {{ $slot }}
</form>
