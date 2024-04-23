@props([
    'label',
    'name',
    'id' => null,
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
        <input
            class="form-control"
            id="{{ $id ?? $name }}"
            name="{{$name}}"
            type="file"
            @if($disabled) disabled @endif multiple>
    </div>

    <div class="invalid-feedback"></div>
</div>
