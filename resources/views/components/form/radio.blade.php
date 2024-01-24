@props([
    'label',
    'name',
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'items' => [],
    'selected' => null,
    'inline' => false,
    'id' => Str::random(8),
])
<div {{ $attributes->class(['mb-3']) }}>
    @isset($label)
        <span class="d-block form-label">{{ $label }}</span>
    @endisset
    @foreach($items as $key => $value)
        <div @class(["form-check", "form-check-inline" => $inline])>
            <input class="form-check-input" name="{{$name}}"
                   type="radio" id="{{$key}}-{{$id}}"
                   value="{{$key}}" @if($value['active']) checked @endif>
            <label for="{{$key}}-{{$id}}" class="form-check-label">
                @if (isset($required))
                    <span class="required">{{ $value['label'] }}</span>
                @else
                    {{ $value }}
                @endif
            </label>
        </div>
    @endforeach
    <div class="invalid-feedback"></div>
</div>
