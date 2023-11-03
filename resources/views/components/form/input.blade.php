<div {{ $attributes->class(['fv-row mb-7 form-group']) }}>
    <label class="fs-6 fw-bold form-label mt-3" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
        @if(isset($required))
            <span class="required">{{$label}}</span>
        @else
            {{$label}}
        @endif
    </label>
    <div class="input-group input-group-solid">
        @isset($prepend){{ $prepend }}@endisset
        <input class="form-control form-control-solid" name="{{$name}}"
               @if(isset($type)) type="{{$type}}" @else type="text" @endif
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif
               @if(isset($value)) value="{{$value}}" @endif>
        @isset($append){{ $append }}@endisset
    </div>
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
