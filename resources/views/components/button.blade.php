@props([
    'name',
    'label' => null,
    'color' => 'primary',
    'size' => null,
    'type' => null,
    'pill' => null,
    'disabled' => null,
    'prepend' => null,
    'append' => null,
    'icon' => null
])
<button type="button" {{ $attributes->class([
    'btn',
    'btn-icon' => $icon,
    'btn-' . ($type === 'label' ? 'label-' : ($type === 'outline' ? 'outline-' : '')) . $color,
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
