@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
])
<div {{ $attributes->class(['mb-3']) }}>
    @if(isset($label))
        <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
            @if(($required))
                <span class="required">{{$label}}</span>
            @else
                {{$label}}
            @endif
        </label>
    @endif
    <div class="input-group">
        <input class="form-control" name="{{$name}}"
               type="file"
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif
               @if(isset($value)) value="{{$value}}" @endif
               @if($disabled) disabled @endif multiple>
    </div>
    <div class="invalid-feedback"></div>
</div>
