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
    'prepend' => null,
    'append' => null,
    'step' => null,
])


<div class="fv-row mb-7 form-group">
    <label class="fs-6 fw-bold form-label mt-3" for="{{ $name }}">
        @if ($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </label>

    <div class="input-group input-group-solid">
        @isset($prepend)
            {{ $prepend }}
        @endisset

        <input
            @class(["form-control form-control-solid", "is-invalid" => $errors->has($name)])
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
            {{ $attributes->whereStartsWith('wire:') }}>

        @isset($append)
            {{ $append }}
        @endisset
    </div>
    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset
    <div class="fv-plugins-message-container invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
