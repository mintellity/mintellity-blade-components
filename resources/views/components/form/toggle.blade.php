@props([
    'name',
    'label',
    'id' => Str::random(8),
    'items' => [],
    'value' => [],
    'disabled' => [],
    'required' => false,
    'readonly' => false,
    'sync' => false,
    'inline' => false,
    'color' => null,
    'labelPosition' => null,
    'labelCol' => 2
])

<div @class(["mb-3", "invalid-feedback-group" => $required, "row" => $labelPosition]) {{ $attributes->whereDoesntStartWith('wire:') }}>
    @isset($label)
        <span @class(["d-block form-label", "col-md-" . $labelCol . " mb-0" => $labelPosition])>
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </span>
    @endisset

    @if($labelPosition)
        <div class="col-md-{{12 - $labelCol}}">
            @endif

            @foreach($items as $key => $itemLabel)
                <div {{ $attributes->class(["form-check form-switch", "form-check-inline" => $inline, "form-check-" . $color => $color]) }}>
                    <input
                        @class(["form-check-input", "is-invalid" => $errors->has($name)])
                        id="{{$id}}-{{$key}}"
                        name="{{ $name }}"
                        @if($sync)
                            type="radio"
                        @else
                            type="checkbox"
                        @endif
                        value="{{ $key }}"
                        @if ($required) required @endif
                        @if(in_array($key, $value)) checked @endif
                        @if(in_array($key, $disabled)) disabled @endif
                        @disabled($readonly)
                        {{ $attributes->whereStartsWith('wire:') }}>
                    @if($readonly)
                        <input
                            type="hidden"
                            name="{{ $name }}"
                            value="{{ $key }}"
                            {{ $attributes->whereStartsWith('wire:') }} />
                    @endif
                    <label for="{{$id}}-{{$key}}" @class(["form-check-label", "required" => $required])>
                        {{ $itemLabel }}
                    </label>
                </div>
            @endforeach

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($labelPosition)
        </div>
    @endif
</div>
