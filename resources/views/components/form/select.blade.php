@props([
    'label',
    'name' => '',
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'options' => [],
    'selected' => null
])

<div class="fv-row mb-7 form-group">
    <label class="fs-6 fw-bold form-label mt-3" for="{{ $name }}">
        @if ($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>

    <select
        @class(["form-select form-select-solid", "is-invalid" => $errors->has($name)])
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($required) required @endif
        @if ($disabled || $readonly) disabled @endif
        {{ $attributes->whereStartsWith('wire:') }}>

        @foreach ($options as $value => $optionLabel)
            <option value="{{ $value }}" @if ($selected == $value) selected @endif>{{ $optionLabel }}</option>
        @endforeach

    </select>

    @if($readonly && !$disabled)
        <input
            type="hidden"
            name="{{ $name }}"
            {{ $attributes->whereStartsWith('wire:') }} />
    @endif

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset
    <div class="fv-plugins-message-container invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
