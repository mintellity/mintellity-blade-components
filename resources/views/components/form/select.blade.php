@props([
    'name',
    'id' => null,
    'label' => null,
    'hint' => null,
    'required' => false,
    'options' => [],
    'selected' => null,
    'disabled' => [],
    'placeholder' => 'Auswählen',
    'inlineLabels' => config('blade-components.forms.inline-labels', false),
    'inlineLabelWidth' => config('blade-components.forms.inline-label-width', '2'),
])

@php
    $labelAttributes = $attributes->prefixed('label');
    $groupAttributes = $attributes->prefixed('group');
    $inputAttributes = $attributes->notPrefixed(['label', 'group']);
@endphp

<div {{ $groupAttributes->class(["mb-3", "invalid-feedback-group", "row" => $inlineLabels]) }}>

    @if($label)
        <label
            {{ $labelAttributes->class(["form-label", "col-md-$inlineLabelWidth col-form-label" => $inlineLabels])->except('for') }}
            for="{{ $name }}">
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif

    @if($inlineLabels)
        <div class="col-md-{{12 - $inlineLabelWidth}}">
            @endif

            <select
                id="{{ $id ?? $name }}"
                name="{{ $name }}"
                {{ $inputAttributes->class(["form-select", "is-invalid" => $errors->has($name)])->except(['id', 'name', 'required']) }}>

                @if($placeholder !== false)
                    <option value="" @if ($selected === null) selected @endif>
                        {{ $placeholder }}
                    </option>
                @endif

                @foreach ($options as $value => $optionLabel)
                    @if(is_iterable($optionLabel))
                        <optgroup label="{{ $value }}">
                            @foreach ($optionLabel as $optgroupValue => $optgroupLabel)
                                <option value="{{ $optgroupValue }}"
                                        @if ($selected !== null && $selected == $optgroupValue) selected @endif>
                                    {{ $optgroupLabel }}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{ $value }}" @if ($selected !== null && $selected == $value) selected @endif>
                            {{ $optionLabel }}
                        </option>
                    @endif
                @endforeach
            </select>

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">@error($name){{ $message }}@enderror</div>

            @if($inlineLabels)
        </div>
    @endif
</div>
