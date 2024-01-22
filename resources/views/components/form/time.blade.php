<div {{ $attributes->class(['mb-3']) }}>
    <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
        @if(isset($required))
            <span class="required">{{$label}}</span>
        @else
            {{$label}}
        @endif
    </label>
    <input class="form-control pikaday" name="{{$name}}"
           type="time" @if(isset($step)) step="{{ $step }}" @endif
           @if(isset($id))
               id="{{$id}}"
           @else
               id="{{$name}}"
           @endif
           @if(isset($value)) value="{{$value}}" @endif>
    <div class="invalid-feedback"></div>
</div>
