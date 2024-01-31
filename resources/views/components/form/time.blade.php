@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
])
<div {{ $attributes->class(['mb-3']) }}>
    @if(isset($label))
        <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
            @if(isset($required))
                <span class="required">{{$label}}</span>
            @else
                {{$label}}
            @endif
        </label>
    @endif
    <input class="form-control pikaday" name="{{$name}}"
           type="time" @if(isset($step)) step="{{ $step }}" @endif
           @if(isset($id))
               id="{{$id}}"
           @else
               id="{{$name}}"
           @endif
           @if(isset($value)) value="{{$value}}" @endif @if($disabled) disabled @endif>
    <div class="invalid-feedback"></div>
</div>
