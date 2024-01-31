@props([
    'name',
    'label',
    'required' => false,
    'disabled' => false,
])
<div  {{ $attributes->class(['mb-3']) }}>
    @if(isset($label))
        <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
            @if(isset($required))
                <span class="required">{{$label}}</span>
            @else
                {{$label}}
            @endif
        </label>
    @endif
    <div class="input-group">
        @isset($prepend){{ $prepend }}@endisset
        <textarea class="form-control dynamic-height" name="{{$name}}"
               type="text"
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif rows="3">@isset($value){{ $value }}@endisset</textarea>
        @isset($append){{ $append }}@endisset
    </div>
    <div class="invalid-feedback"></div>
</div>
