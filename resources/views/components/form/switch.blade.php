@props([
    'name',
    'label',
    'id' => Str::random(8),
    'items' => [],
    'value' => [],
    'disabled' => [],
    'required' => false,
    'readonly' => false,
    'sync' => false,
    'color' => null,
    'labelPosition' => null,
    'labelCol' => 2
])

@php
    $labelPositionLeft = 'left' === $labelPosition;
@endphp

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPositionLeft]) {{ $attributes->whereDoesntStartWith('wire:') }}>
    @isset($label)
        <span @class(["d-block form-label", "col-md-" . $labelCol . " mb-0" => $labelPositionLeft])>
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </span>
    @endisset

    @if($labelPositionLeft)
        <div class="col-md-{{12 - $labelCol}}">
            @endif

            @foreach($items as $key => $itemLabel)
                <label {{ $attributes->class(["switch", "switch-" . $color => $color]) }}>
                    <input
                        @class(["switch-input", "is-invalid" => $errors->has($name)])
                        id="{{$id}}-{{$key}}"
                        name="{{ $name }}"
                        @if($sync)
                            type="radio"
                        @else
                            type="checkbox"
                        @endif
                        value="{{ $key }}"
                        @if(in_array($key, $value)) checked @endif
                        @if(in_array($key, $disabled)) disabled @endif
                        @disabled($readonly)
                        {{ $attributes->whereStartsWith('wire:') }}>
                    @if($readonly)
                        <input
                            type="hidden"
                            name="{{ $name }}"
                            value="{{ $key }}"
                            {{ $attributes->whereStartsWith('wire:') }} />
                    @endif
                    <span class="switch-toggle-slider">
                    <span class="switch-on"> <x-mint::icon name="check" /></span>
                    <span class="switch-off"> <x-mint::icon name="x" /></span>
                </span>
                    <span for="{{$id}}-{{$key}}" @class(["switch-label","required" => $required])>
                        {{ $itemLabel }}
                    </span>
                </label>
            @endforeach

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">
                @error($name){{ $message }}@enderror
            </div>

            @if($labelPositionLeft)
        </div>
    @endif
</div>
