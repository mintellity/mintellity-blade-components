@props([
    'method' => 'POST',
    'action' => '/',
])

@php
    $method = strtoupper($method);

    if ($method === 'DESTROY') {
        $method = 'DELETE';
    }

    $formMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']) ? 'POST' : $method;
@endphp

<form
    action="{{ $action }}"
    method="{{ $formMethod }}"
    data-disable-button-on-submit="{{ config('blade-components.forms.disable-button-on-submit', true) ? 'true' : 'false' }}"
    {{ $attributes->class('ajax-form')->merge(['enctype' => "multipart/form-data"]) }}>
    @csrf

    @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    {{ $slot }}
</form>
