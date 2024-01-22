@props([
    'name' => '',
    'label' => '',
    'value' => 1,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
])

<div {{ $attributes->class("mb-3")->whereDoesntStartWith('wire:') }}>
    <div class="form-check form-switch">
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

        <label for="{{ $name }}" @class(["form-check-label","required" => $required])>
            {{ $label }}
        </label>
    </div>

    <div class="invalid-feedback">
        @error($name){{ $message }}@enderror
    </div>
</div>
