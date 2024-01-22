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
<?php
$options = [
        'option1' => 'Option 1 Label',
        'option2' => 'Option 2 Label',
        'option3' => 'Option 3 Label',
    ];
?>
<div {{ $attributes->class(['mb-3']) }}>
    <label class="form-label" for="{{ $name }}">
        @if ($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>

    <select
        @class(["form-select", "is-invalid" => $errors->has($name)])
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
    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
