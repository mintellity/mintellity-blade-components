@props([
    'name',
    'label',
    'rows' => 3,
    'required' => false,
    'disabled' => false,
    'prepend' => null,
    'append' => null,
    'placeholder' => null,
    'groupClass' => null,
    'labelPosition' => null,
    'labelCol' => '2'
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

            <div @class(["input-group" => $prepend || $append, $groupClass => $groupClass])>
                @isset($prepend){{ $prepend }}@endisset
                <textarea
                    {{ $attributes->class(['form-control dynamic-height']) }}
                    name="{{$name}}"
                    type="text"
                    @if(isset($id))
                        id="{{$id}}"
                    @else
                        id="{{$name}}"
                    @endif rows="{{$rows}}"
                    @if ($placeholder) placeholder="{{ $placeholder }}" @endif>@isset($value){{ $value }}@endisset</textarea>
                @isset($append){{ $append }}@endisset
            </div>

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($labelPosition)
        </div>
    @endif
</div>
