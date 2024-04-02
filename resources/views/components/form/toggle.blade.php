@props([
    'name',
    'label',
    'value' => 1,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'color' => null
])

<div @class(["mb-3", "invalid-feedback-group" => $required]) {{ $attributes->whereDoesntStartWith('wire:') }}>
    <div {{ $attributes->class(["form-check form-switch", "form-check-" . $color => $color]) }}>
        <input
            @class(["form-check-input", "is-invalid" => $errors->has($name)])
            id="{{ $name }}"
            name="{{ $name }}"
            type="checkbox"
            value="{{ $value }}"
            @checked($checked)
            @disabled($disabled || $readonly)
            {{ $attributes->whereStartsWith('wire:') }}>
        @if($readonly)
            <input
                type="hidden"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $attributes->whereStartsWith('wire:') }} />
        @endif
        @if(isset($label))
            <label for="{{ $name }}" @class(["form-check-label","required" => $required])>
                {{ $label }}
            </label>
        @endif
    </div>

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset

    <div class="invalid-feedback">
        @error($name){{ $message }}@enderror
    </div>
</div>
