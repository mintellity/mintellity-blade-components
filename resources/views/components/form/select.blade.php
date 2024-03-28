@props([
    'label',
    'name' => '',
    'hint' => null,
    'required' => false,
    'readonly' => false,
    'options' => [],
    'value' => null,
    'disabled' => [],
    'placeholder' => null,
    'multiple' => false
])
<div @class(["mb-3", "invalid-feedback-group" => $required])>
    <label class="form-label" for="{{ $name }}">
        @if ($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>

    <select
        {{ $attributes->class(['form-select', "is-invalid" => $errors->has($name)]) }}
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($required) required @endif
        @if ($disabled || $readonly) disabled @endif
        @if($multiple) multiple @endif
        {{ $attributes->whereStartsWith('wire:') }}>
        @if($placeholder)
            <option value=""
                    @if(!$value) selected @endif>{{$placeholder}} </option>
        @endif
        @foreach ($options as $key => $optionLabel)
            <option value="{{ $key }}"
                    @if($key === $value) selected @endif>
                {{ $optionLabel }}
            </option>
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
