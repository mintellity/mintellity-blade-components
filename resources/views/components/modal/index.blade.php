@props([
    'id'
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div {{ $attributes->class(['modal-dialog']) }} role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
