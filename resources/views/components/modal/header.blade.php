@props([
    'hostId'
])
<div class="modal-header">
    <h5 class="modal-title" id="{{$hostId}}Label">
        {{ $slot }}
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
