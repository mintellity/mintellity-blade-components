<div  {{ $attributes->class(['form-group d-flex justify-content-end']) }}>
    <label class="form-check form-switch form-check-custom form-check-solid mt-3">
        <input class="form-check-input" name="{{$name}}"
               type="checkbox" id="{{$name}}"
               @if(isset($value)) value="{{$value}}" @endif>
        <span class="form-check-label fw-bold text-muted @if(isset($required)) required @endif"> {{$label}} </span>
    </label>
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
