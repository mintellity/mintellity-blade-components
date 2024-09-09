@props([
    'label' => null,
    'hint' => null,
    'required' => false,
    'items' => [],
    'value' => [],
    'disabled' => false,
    'inlineLabels' => config('blade-components.forms.inline-labels', false),
    'inlineLabelWidth' => config('blade-components.forms.inline-label-width', '2'),
])

@php
    $itemAttributes = $attributes->prefixed('item');
    $itemGroupAttributes = $attributes->prefixed('item-group');
    $itemLabelAttributes = $attributes->prefixed('item-label');
    $labelAttributes = $attributes->prefixed('label');
    $groupAttributes = $attributes->notPrefixed(['label', 'item', 'item-group', 'item-label']);
@endphp

<div {{ $groupAttributes->class(["mb-3", "invalid-feedback-group", "row" => $inlineLabels]) }}>
    @if($label)
        <span {{ $labelAttributes->class(["d-block form-label", "col-md-$inlineLabelWidth mb-0" => $inlineLabels]) }}>
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </span>
    @endif

    @if($inlineLabels)
        <div class="col-md-{{ 12 - $inlineLabelWidth }}">@endif

            @foreach($items as $key => $itemLabel)
                <div {{ $itemGroupAttributes->class("form-check") }}>
                    <input
                        id="{{ $key }}"
                        name="{{ $key }}"
                        type="checkbox"
                        value="{{ $key }}"
                        @if(in_array($key, $value)) checked @endif
                        @if((is_bool($disabled) && $disabled) || (is_array($disabled) && in_array($key, $disabled))) disabled @endif
                        {{ $itemAttributes->class("form-check-input")->except(['name', 'id', 'type', 'value', 'checked', 'disabled']) }}>

                    <label
                        {{ $itemLabelAttributes->class("form-check-label")->except('for') }}
                        for="{{$key}}">
                        {{ $itemLabel }}
                    </label>
                </div>
            @endforeach

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback"></div>

            @if($inlineLabels)</div>
    @endif
</div>
