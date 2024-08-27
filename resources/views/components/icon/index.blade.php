@props([
    'name',
    'type' => null
])

<i {{ $attributes->class(['fa' => !$type, 'fa-' . $type => $type, 'fa-' . $name]) }}></i>
