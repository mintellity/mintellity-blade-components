@props([
    'label' => null,
    'size' => null
])

<div {{ $attributes->class(['btn-group', 'btn-group-' . $size => $size])->merge(['role' => 'group']) }} @if($label) aria-label="{{ $label }}" @endif>
    {{ $slot }}
</div>
