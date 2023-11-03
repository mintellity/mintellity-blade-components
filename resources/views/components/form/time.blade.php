<div class="fv-row mb-7 form-group">
    <label class="fs-6 fw-bold form-label mt-3" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
        @if(isset($required))
            <span class="required">{{$label}}</span>
        @else
            {{$label}}
        @endif
    </label>
    <input class="form-control form-control-solid pikaday" name="{{$name}}"
           type="time" @if(isset($step)) step="{{ $step }}" @endif
           @if(isset($id))
               id="{{$id}}"
           @else
               id="{{$name}}"
           @endif
           @if(isset($value)) value="{{$value}}" @endif>
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
