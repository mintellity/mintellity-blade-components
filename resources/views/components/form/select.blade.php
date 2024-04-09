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
    'multiple' => false,
    'size' => null,
    'labelPosition' => null,
    'labelCol' => 2
])

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPosition])>
    <label @class(["form-label", "col-md-" . $labelCol . " col-form-label" => $labelPosition]) for="{{ $name }}">
        @if ($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>

    @if($labelPosition)
        <div class="col-md-{{12 - $labelCol}}">
    @endif

        <select
            {{ $attributes->class(['form-select', "form-select-" . $size => $size, "is-invalid" => $errors->has($name)]) }}
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

    @if($labelPosition)
        </div>
    @endif
</div>
