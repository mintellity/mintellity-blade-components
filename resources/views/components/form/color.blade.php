@props([
    'name',
    'label',
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'labelPosition' => null,
    'labelCol' => 2
])

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPosition])>
    @if(isset($label))
        <label @class(["form-label", "col-md-" . $labelCol . " col-form-label" => $labelPosition]) for="{{ $name }}">
            @isset($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endisset
        </label>
    @endif

    @if($labelPosition)
        <div class="col-md-{{12 - $labelCol}}">
            @endif

            <input
                {{ $attributes->class(["form-control form-control-color"]) }}
                id="{{ $name }}"
                name="{{ $name }}"
                type="color"
                value="{{ $value ?? '' }}"
                {{ $attributes->whereStartsWith('wire:') }} />

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($labelPosition)
        </div>
    @endif
</div>
