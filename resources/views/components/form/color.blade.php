<div {{ $attributes->class(['mb-3']) }}>
    <label class="form-label" for="{{ $name }}">
        @isset($required)
            <span class="required">{{ $label }}</span>
        @else
            {{ $label }}
        @endisset
    </label>
    <input
        @class(["form-control form-control-color", "is-invalid" => $errors->has($name)])
        id="{{ $name }}"
        name="{{ $name }}"
        type="color"
        value="{{ $value ?? '' }}"
        {{ $attributes->whereStartsWith('wire:') }}>
    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
