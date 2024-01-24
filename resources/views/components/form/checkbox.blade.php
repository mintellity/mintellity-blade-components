@props([
    'label',
    'name',
    'hint' => null,
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'items' => [],
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
                   type="checkbox" id="{{$id}}-{{$key}}"
                   @if($item['value']) value="{{$item['value']}}"  @endif
                   @if($item['checked']) checked @endif
                   @if($item['disabled']) disabled @endif>
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
