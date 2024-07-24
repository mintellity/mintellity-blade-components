@props([
    'finalCol' => false
])

<td {{ $attributes->class(['text-end' => $finalCol]) }}>
    {{ $slot }}
</td>
