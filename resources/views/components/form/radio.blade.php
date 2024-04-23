@props([
    'label',
    'name',
    'id' => null,
    'hint' => null,
    'required' => false,
    'items' => [],
    'inline' => false,
    'id' => Str::random(8),
    'value' => null,
    'disabled' => [],
    'itemClass' => null,
])
<div {{ $attributes->class(['mb-3']) }}>
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
        <div @class(["form-check", "form-check-inline" => $inline, $itemClass => $itemClass])>
            <input
                class="form-check-input"
                id="{{ $id ?? $name }}"
                name="{{$name}}"
                type="radio"
                value="{{ $key }}"
                @if($value === $key) checked @endif
                @if(in_array($key, $disabled)) disabled @endif>

            <label for="{{$id}}-{{$key}}" class="form-check-label">
                {{ $itemLabel }}
            </label>
        </div>
    @endforeach

    <div class="invalid-feedback"></div>
</div>
