@props([
    'label',
    'name',
    'hint' => null,
    'required' => false,
    'items' => [],
    'inline' => false,
    'id' => Str::random(8),
    'value' => null,
    'disabled' => [],
    'color' => null,
    'labelPosition' => null,
    'labelCol' => 2
])

@php
    $labelPositionLeft = 'left' === $labelPosition;
@endphp

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPositionLeft])>
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
            <div {{ $attributes->class(["form-check", "form-check-inline" => $inline, "form-check-" . $color => $color]) }}>
                <input class="form-check-input" name="{{$name}}"
                       type="radio" id="{{$id}}-{{$key}}"
                       value="{{ $key }}"
                       @if($value === $key) checked @endif
                       @if(in_array($key, $disabled)) disabled @endif>
                <label for="{{$id}}-{{$key}}" class="form-check-label">
                    {{ $itemLabel }}
                </label>
            </div>
        @endforeach

        @isset($hint)
            <small class="form-text text-muted">{{ $hint }}</small>
        @endisset

        <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

    @if($labelPositionLeft)
        </div>
    @endif
</div>
