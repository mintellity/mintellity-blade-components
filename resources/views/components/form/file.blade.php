<div {{ $attributes->class(['mb-3']) }}>
    <label class="form-label" @if(isset($id)) for="{{$id}}" @else for="{{$name}}"@endif>
        @if(isset($required))
            <span class="required">{{$label}}</span>
        @else
            {{$label}}
        @endif
    </label>
    <div class="input-group">
        <input class="form-control" name="{{$name}}"
               type="file"
               @if(isset($id))
                   id="{{$id}}"
               @else
                   id="{{$name}}"
               @endif
               @if(isset($value)) value="{{$value}}" @endif multiple>
    </div>
    <div class="invalid-feedback"></div>
</div>
