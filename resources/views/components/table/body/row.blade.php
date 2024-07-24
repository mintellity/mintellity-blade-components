@props([
    'odd' => true
])

<tr {{ $attributes->class(['odd' => $odd]) }}>
    {{ $slot }}
</tr>
