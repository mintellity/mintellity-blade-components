@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
])
<div @class(["mb-3", "invalid-feedback-group" => $required])>
    @if(isset($label))
        <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
            @if(isset($required))
                <span class="required">{{$label}}</span>
            @else
                {{$label}}
            @endif
        </label>
    @endif
    <input
        {{ $attributes->class(["form-control pikaday"]) }}
           type="time" @if(isset($step)) step="{{ $step }}" @endif
           @if(isset($id))
               id="{{$id}}"
           @else
               id="{{$name}}"
           @endif
           @if(isset($value)) value="{{$value}}" @endif @if($disabled) disabled @endif>
    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset
</div>
