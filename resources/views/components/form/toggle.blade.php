@props([
    'label',
    'name',
    'id' => null,
    'value' => 1,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'itemClass' => null
])

<div {{ $attributes->class("mb-3")->whereDoesntStartWith('wire:') }}>
    <div @class(["form-check form-switch", $itemClass => $itemClass])>
        <input
            @class(["form-check-input", "is-invalid" => $errors->has($name)])
            id="{{ $id ?? $name }}"
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

    <div class="invalid-feedback">
        @error($name){{ $message }}@enderror
    </div>
</div>
