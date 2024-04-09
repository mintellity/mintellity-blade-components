@props([
    'label',
    'name',
    'hint' => null,
    'required' => false,
    'items' => [],
    'inline' => false,
    'id' => Str::random(8),
    'value' => [],
    'disabled' => [],
    'color' => null,
    'labelPosition' => null,
    'labelCol' => 2
])

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPosition])>
    @isset($label)
        <span @class(["d-block form-label", "col-md-" . $labelCol . " mb-0" => $labelPosition])>
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </span>
    @endisset

    @if($labelPosition)
        <div class="col-md-{{12 - $labelCol}}">
            @endif

            @foreach($items as $key => $itemLabel)
                <div {{ $attributes->class(["form-check", "form-check-inline" => $inline, "form-check-" . $color => $color]) }}>
                    <input class="form-check-input" name="{{$name}}"
                           type="radio" id="{{$id}}-{{$key}}"
                           value="{{ $key }}"
                           @if ($required) required @endif
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

            @if($labelPosition)
        </div>
    @endif
</div>
