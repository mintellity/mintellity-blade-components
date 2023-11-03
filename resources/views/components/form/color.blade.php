<div class="fv-row mb-7 form-group">
    <label class="fs-6 fw-bold form-label mt-3" for="{{ $name }}">
        @isset($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endisset
    </label>
    <input
        @class(["form-control form-control-solid form-control-color", "is-invalid" => $errors->has($name)])
        id="{{ $name }}"
        name="{{ $name }}"
        type="color"
        value="{{ $value ?? '' }}"
        {{ $attributes->whereStartsWith('wire:') }}>
    <div class="fv-plugins-message-container invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
