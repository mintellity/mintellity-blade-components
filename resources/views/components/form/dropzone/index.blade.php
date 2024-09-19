@props([
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'maxFiles' => null,
    'inlineLabels' => config('blade-components.forms.inline-labels', false),
    'inlineLabelWidth' => config('blade-components.forms.inline-label-width', '2'),
])

@php
    // Make sure maxFiles is a positive integer or null
    if ($maxFiles && $maxFiles <= 0) {
        $maxFiles = null;
    }

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

            <div {{ $inputWrapperAttributes->class(["form-control", "form-dropzone", "p-1", "overflow-hidden", "is-invalid" => $errors->has($name)]) }} @if($maxFiles) data-max-files="{{ $maxFiles }}" @endif>


                <div>
                    <x-mint::icon name="upload" class="me-2" />
                    <span>Dateien hier ablegen oder klicken, um hochzuladen</span>
                </div>

                @if($maxFiles)
                    <div>
                        @if($maxFiles === 1)
                            (Max. {{ $maxFiles }} Datei)
                        @else()
                            (Max. {{ $maxFiles }} Dateien)
                        @endif
                    </div>
                @endif

                <input
                    id="{{ $id ?? $name }}"
                    name="{{ $name }}"
                    type="file"
                    @if($maxFiles > 1) multiple @endif
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
