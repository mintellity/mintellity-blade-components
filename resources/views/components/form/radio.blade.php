@isset($label)
    <label>{{ $label }}</label>
@endisset
@foreach($items as $key => $value)
    <div class="form-group d-flex justify-content-start">
        <label class="form-check form-check-custom form-check-solid mt-3">
            <input class="form-check-input" name="{{$name}}"
                   type="radio" id="{{$key}}"
                   @if(isset($value)) value="{{$value}}" @endif>
            <span class="form-check-label fw-bold @if(isset($required)) required @endif"> {{$value}} </span>
        </label>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
@endforeach


