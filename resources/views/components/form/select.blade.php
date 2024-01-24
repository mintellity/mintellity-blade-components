@props([
    'label',
    'name' => '',
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'options' => [],
    'selected' => null,
    'placeholder' => null,
    'multiple' => false
])
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
        @if($multiple) multiple @endif
        {{ $attributes->whereStartsWith('wire:') }}>
        @if($placeholder)
            <option value="">{{$placeholder}}</option>
        @endif
        @foreach ($options as $value => $option)
            <option value="{{ $option['value'] }}" @if ($option['selected']) selected @endif>{{ $option['label'] }}</option>
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
