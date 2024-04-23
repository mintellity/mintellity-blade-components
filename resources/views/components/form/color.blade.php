@props([
    'name',
    'label',
    'id' => null,
    'required' => false,
    'disabled' => false,
])
<div {{ $attributes->class(['mb-3']) }}>
    @if(isset($label))
        <label class="form-label" for="{{ $name }}">
            @isset($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endisset
        </label>
    @endif

    <input
        @class(["form-control form-control-color", "is-invalid" => $errors->has($name)])
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        type="color"
        value="{{ $value ?? '' }}"
        {{ $attributes->whereStartsWith('wire:') }}>

    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
