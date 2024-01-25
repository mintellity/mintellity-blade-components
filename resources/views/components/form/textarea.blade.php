<div  {{ $attributes->class(['fv-row mb-7 form-group']) }}>
    <label class="fs-6 fw-bold form-label mt-3" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
        @if(isset($required))
            <span class="required">{{$label}}</span>
        @else
            {{$label}}
        @endif
    </label>
    <div class="grow-wrap">
        @isset($prepend){{ $prepend }}@endisset
        <textarea class="form-control form-control-solid" name="{{$name}}"
               type="text"
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif rows="3">@isset($value){{ $value }}@endisset</textarea>
        @isset($append){{ $append }}@endisset
    </div>
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
