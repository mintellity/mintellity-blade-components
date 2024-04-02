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
    'color' => null
])
<div @class(["mb-3", "invalid-feedback-group" => $required])>
    @isset($label)
        <span class="d-block form-label">
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </span>
    @endisset

    @foreach($items as $key => $itemLabel)
        <div {{ $attributes->class(["form-check", "form-check-inline" => $inline, "form-check-" . $color => $color ]) }}>
            <input class="form-check-input" name="{{$name}}"
                   type="checkbox" id="{{$id}}-{{$key}}"
                   value="{{ $key }}"
                   @if(in_array($key, $value)) checked @endif
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
</div>
