@props([
    'label',
    'name',
    'hint' => null,
    'active' => false,
    'required' => false,
    'disabled' => false,
    'items' => [],
    'selected' => null,
    'inline' => false,
    'id' => Str::random(8),
    'itemClass' => null
])
<div {{ $attributes->class(['mb-3']) }}>
    @isset($label)
        <span class="d-block form-label">{{ $label }}</span>
    @endisset
    @foreach($items as $key => $item)
        <div @class(["form-check", "form-check-inline" => $inline, $itemClass => $itemClass])>
            <input class="form-check-input" name="{{$name}}"
                   type="radio" id="{{$id}}-{{$key}}"
                   @if($item['value']) value="{{$item['value']}}"  @endif
                   @if($item['active']) checked @endif @if($item['disabled']) disabled @endif>
            <label for="{{$id}}-{{$key}}" class="form-check-label">
                @if (isset($required))
                    <span class="required">{{ $item['label'] }}</span>
                @else
                    {{ $item['label'] }}
                @endif
            </label>
        </div>
    @endforeach
    <div class="invalid-feedback"></div>
</div>
