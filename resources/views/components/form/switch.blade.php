@props([
    'name',
    'label',
    'value' => 1,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'switchClass' => null,
    'sync' => false
])
<div {{ $attributes->class("mb-3")->whereDoesntStartWith('wire:') }}>
    <label @class(["switch", $switchClass => $switchClass])>
        <input
            @class(["switch-input", "is-invalid" => $errors->has($name)])
            id="{{ $name }}"
            name="{{ $name }}"
            @if($sync)
                type="radio"
            @else
                type="checkbox"
            @endif
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
        <span class="switch-toggle-slider">
            <span class="switch-on"> <x-mint::icon name="check" /></span>
            <span class="switch-off"> <x-mint::icon name="x" /></span>
        </span>
        @if(isset($label))
            <span for="{{ $name }}" @class(["switch-label","required" => $required])>
                {{ $label }}
            </span>
        @endif
    </label>

    <div class="invalid-feedback">
        @error($name){{ $message }}@enderror
    </div>
</div>
