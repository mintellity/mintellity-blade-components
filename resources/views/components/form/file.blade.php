@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
    'prepend' => null,
    'append' => null,
])
<div @class(["mb-3", "invalid-feedback-group" => $required])>
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
        @isset($prepend){{ $prepend }}@endisset
        <input class="form-control" name="{{$name}}"
               type="file"
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif
               @if(isset($value)) value="{{$value}}" @endif
               @if($disabled) disabled @endif multiple>
        @isset($append){{ $append }}@endisset
    </div>

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset

    <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>
</div>
