@props([
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'hint' => null,
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
            {{ $labelAttributes->class(["form-label", "col-md-$inlineLabelWidth" => $inlineLabels])->except('for') }}
            for="{{ $name }}">
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif

    @if($inlineLabels)
        <div class="col-md-{{ 12 - $inlineLabelWidth }}">@endif

            <div @class(["form-check form-switch"])>
                <input
                    id="{{ $name }}"
                    name="{{ $id ?? $name }}"
                    type="checkbox"
                    @if($required) required @endif
                    {{ $inputAttributes->class(["form-check-input", "is-invalid" => $errors->has($name)])->except('type') }}>

                <div class="invalid-feedback">
                    @error($name){{ $message }}@enderror
                </div>
            </div>

            @if($inlineLabels)</div>
    @endif

    @isset($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endisset
</div>
