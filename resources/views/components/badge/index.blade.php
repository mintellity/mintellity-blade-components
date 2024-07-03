@props([
    'color' => null,
    'type' => null,
    'pill' => false,
    'square' => false,
    'badge' => null,
])
<span {{ $attributes->class([
    'badge',
    'bg-' . ($type === 'label' ? 'label-' : '') . $color => $color,
    'rounded-pill' => $pill,
    'badge-center' => $square,
    collect(explode(' ', $badge))->map(function ($item) {
        return 'badge-' . $item;
    })->implode(' ') => $badge,
]) }}>{{ $slot }}</span>
