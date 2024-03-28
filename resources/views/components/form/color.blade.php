@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
])
<div {{ $attributes->class(['mb-3']) }}>
    @if(isset($label))
        <label class="form-label" for="{{ $name }}">
            @isset($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endisset
        </label>
    @endif

    <input
        {{ $attributes->class(["form-control form-control-color"]) }}
        id="{{ $name }}"
        name="{{ $name }}"
        type="color"
        value="{{ $value ?? '' }}"
        {{ $attributes->whereStartsWith('wire:') }} />

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset

    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
