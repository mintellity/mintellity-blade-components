@props([
    'name',
    'label' => null,
    'color' => null,
    'size' => null,
    'type' => null,
    'pill' => null,
    'disabled' => null,
    'prepend' => null,
    'append' => null,
    'square' => null
])
<button type="button" {{ $attributes->class([
    'btn',
    'btn-icon' => $square,
    'btn-' . ($type === 'label' ? 'label-' : ($type === 'outline' ? 'outline-' : '')) . $color => $color,
    'btn-' . $size  => $size,
    'rounded-pill' => $pill,
]) }}
    @isset($disabled) disabled @endisset
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
