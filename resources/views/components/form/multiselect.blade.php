@props([
    'label',
    'name',
    'id' => null,
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'options' => collect(),
    'selected' => null
])

<div class="mb-7 form-group">
    @if($label || $required)
        <label class="fw-bold form-label mt-3" for="{{ $name }}">
            @if ($required)
                <span class="required">{{ $label ?? '' }}</span>
            @else
                {{ $label ?? '' }}
            @endif
        </label>
    @endif

    <div class="input-group input-group-solid d-flex flex-column gap-3 p-3 overflow-auto" style="max-height: 10rem">
        @foreach($options as $value => $optionLabel)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="{{ $name }}[]"
                    id="{{ $id ?? $name }}_{{ $value }}"
                    value="{{ $value }}"
                    @if(in_array($value, $selected ?? [], true)) checked @endif
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @if($readonly) readonly @endif
                    {{ $attributes->whereStartsWith('wire:') }} />
                <label class="form-check-label" for="{{ $name }}_{{ $value }}">
                    {{ $optionLabel }}
                </label>
            </div>
        @endforeach

        {{-- For Ajax-Form-Validation --}}
        <input
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            class="d-none form-control"
            type="hidden"
            disabled/>
    </div>

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset

    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
