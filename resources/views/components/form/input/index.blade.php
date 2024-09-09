@props([
    'name',
    'id' => null,
    'label' => null,
    'type' => 'text',
    'required' => false,
    'hint' => null,
    'prepend' => null,
    'append' => null,
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
            for="{{ $id ?? $name }}">
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif

    @if($inlineLabels)
        <div class="col-md-{{ 12 - $inlineLabelWidth }}">@endif

            <div class="input-group">
                @isset($prepend)
                    {{ $prepend }}
                @endisset

                <input
                    id="{{ $id ?? $name }}"
                    name="{{ $name }}"
                    type="{{ $type }}"
                    @if($required) required @endif
                    {{ $inputAttributes->class(["form-control", "is-invalid" => $errors->has($name)])->except(['id', 'name', 'type', 'required']) }}>


                @isset($append)
                    {{ $append }}
                @endisset
            </div>

            @isset($hint)
                <small class="form-text text-muted">{{ $hint }}</small>
            @endisset

            <div class="invalid-feedback">
                @error($name){{ $message }}@enderror
            </div>

            @if($inlineLabels)</div>
    @endif
</div>
