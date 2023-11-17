@props([
    'name' => '',
    'label' => '',
    'value' => 1,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
])

<div {{ $attributes->class("fv-row mb-7 form-group d-flex h-100")->whereDoesntStartWith('wire:') }}>
    <label class="form-check form-switch form-check-custom form-check-solid mt-3">
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

        <span @class(["form-check-label fw-bold text-muted","required" => $required])>
            {{ $label }}
        </span>
    </label>

    <div class="fv-plugins-message-container invalid-feedback">
        @error($name){{ $message }}@enderror
    </div>
</div>
