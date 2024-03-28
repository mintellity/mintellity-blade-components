@props([
    'name',
    'size' => null,
    'rotate' => null,
    'border' => null,
    'animation' => null,
    'type' => null,
])
<i {{ $attributes->class([
    'bx',
    'b' . ($type ? 'xs-' : 'x-') . $name,
    'bx-' . $size  => $size,
    'bx-rotate-' . $rotate  => $rotate,
    'bx-' . ($border === 'circle' ? 'border-circle' : 'border') => $border,
    'bx-' . $animation  => $animation,
]) }}></i>
