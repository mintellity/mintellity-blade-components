@props([
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'inlineLabels' => config('blade-components.forms.inline-labels', false),
    'inlineLabelWidth' => config('blade-components.forms.inline-label-width', '2'),
])

@php
    $labelAttributes = $attributes->prefixed('label');
    $groupAttributes = $attributes->prefixed('group');
    $inputWrapperAttributes = $attributes->prefixed(['wrapper']);
    $inputAttributes = $attributes->notPrefixed(['label', 'group', 'wrapper']);
@endphp

<div {{ $groupAttributes->class(["mb-3", "invalid-feedback-group", "form-dropzone-group", "row" => $inlineLabels]) }}>
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

            <div {{ $inputWrapperAttributes->class(["form-control", "form-dropzone", "p-1", "overflow-hidden", "is-invalid" => $errors->has($name)]) }}>
                <x-mint::icon name="upload" class="me-2" />

                <span>
                    Dateien hier ablegen oder klicken, um hochzuladen
                </span>

                <input
                    id="{{ $id ?? $name }}"
                    name="{{ $name }}"
                    type="file"
                    @if($required) required @endif
                    {{ $inputAttributes->class(["form-dropzone-input"])->except(['id', 'name', 'type', 'required']) }}/>
            </div>

            <div class="form-dropzone-list">
                Noch keine Dateien ausgewählt
            </div>

            <div class="invalid-feedback">
                @error($name){{ $message }}@enderror
            </div>

            @if($inlineLabels)</div>
    @endif
</div>
