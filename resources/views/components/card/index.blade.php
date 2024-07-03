<div class="card">
    {{ $header ?? '' }}

    <div class="card-body pt-5">
        {{ $slot }}
    </div>

    {{ $footer ?? '' }}
</div>
