@props([
    'label' => null,
    'color' => null,
    'size' => null,
    'type' => null,
    'prepend' => null,
    'append' => null,
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
    @isset($prepend)
        {{ $prepend }}
    @endisset

    @isset($label)
        {{ $label }}
    @endisset

    @isset($append)
        {{ $append }}
    @endisset
</button>
