@props([
    'name',
    'size' => null,
    'color' => null,
    'rotate' => null,
    'border' => null,
    'animation' => null,
    'type' => null,
])
<i {{ $attributes->class([
    'bx',
    'b' . ($type === 'solid' ? 'xs-' : ($type === 'brand' ? 'xl-' : 'x-')) . $name,
    'bx-' . $size  => $size,
    'bx-rotate-' . $rotate  => $rotate,
    'bx-' . ($border === 'circle' ? 'border-circle' : 'border') => $border,
    'bx-' . $animation  => $animation,
    'text-' . $color => $color
]) }}></i>
