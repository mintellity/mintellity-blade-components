@props([
    'label' => null,
    'color' => null,
    'size' => null,
    'type' => null,
    'disabled' => false,
    'pill' => false,
    'square' => false
])
<button type="button" {{ $attributes->class([
    'btn',
    'btn-icon' => $square,
    'btn-' . ($type === 'label' ? 'label-' : ($type === 'outline' ? 'outline-' : '')) . $color => $color,
    'btn-' . $size  => $size,
    'rounded-pill' => $pill,
]) }}
    @if($disabled) disabled @endif
>
    {{ $slot }}
</button>
