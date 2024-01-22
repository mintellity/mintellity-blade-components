<div {{ $attributes->class(['mb-3']) }}>
    @isset($label)
        <span class="d-block form-label">{{ $label }}</span>
    @endisset
    @foreach($items as $key => $value)
        <div @class(["form-check", "form-check-inline" => isset($inline)])>
            <input class="form-check-input" name="{{$name}}"
                   type="radio" id="{{$key}}"
                   @if(isset($value)) value="{{$value}}" @endif>
            <label for="{{$key}}" class="form-check-label">
                @if (isset($required))
                    <span class="required">{{ $value }}</span>
                @else
                    {{ $value }}
                @endif
            </label>
        </div>
    @endforeach
    <div class="invalid-feedback"></div>
</div>
