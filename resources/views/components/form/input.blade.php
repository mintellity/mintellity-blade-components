@props([
    'name',
    'label' => '',
    'hint' => null,
    'type' => null,
    'accept' => null,
    'min' => null,
    'max' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'pill' => false,
    'size' => null,
    'prepend' => null,
    'append' => null,
    'step' => null,
    'placeholder' => null,
    'groupClass' => null,
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

            <div @class(["input-group" => $prepend || $append, $groupClass => $groupClass])>
                @isset($prepend)
                    {{ $prepend }}
                @endisset

                <input
                    {{ $attributes->class(['form-control', "form-control-" . $size => $size, "is-invalid" => $errors->has($name), "rounded-pill" => $pill]) }}
                    id="{{ $name }}"
                    name="{{ $name }}"
                    type="{{ $type ?? 'text' }}"
                    @isset($value) value="{{ $value }}" @endisset
                    @isset($accept) accept="{{ $accept }}" @endisset
                    @isset($min) min="{{ $min }}" @endisset
                    @isset($max) max="{{ $max }}" @endisset
                    @if ($required) required @endif
                    @if ($disabled) disabled @endif
                    @if ($readonly) readonly @endif
                    @if ($step) step="{{ $step }}" @endif
                    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                    {{ $attributes->whereStartsWith('wire:') }} />

                @isset($append)
                    {{ $append }}
                @endisset
            </div>

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($labelPosition)
        </div>
    @endif
</div>
