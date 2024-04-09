@props([
    'name',
    'label',
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'labelPosition' => null,
    'labelCol' => 2
])
<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPosition])>
    @if(isset($label))
        <label @class(["form-label", "col-md-" . $labelCol . " col-form-label" => $labelPosition]) @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
            @if(isset($required))
                <span class="required">{{$label}}</span>
            @else
                {{$label}}
            @endif
        </label>
    @endif

    @if($labelPosition)
        <div class="col-md-{{12 - $labelCol}}">
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

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($labelPosition)
        </div>
    @endif
</div>
