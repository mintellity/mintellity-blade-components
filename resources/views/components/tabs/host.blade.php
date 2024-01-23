@props([
    'id' => 'tab-host-' . Str::random(8),
    'hostId',
    'navClass' => 'nav-tabs',
    'navWrapperElement' => false,
    'navWrapperClass' => '',
])

<div {{ $attributes }}>
    @if($navWrapperElement)
        <{{ $navWrapperElement }} class="{{ $navWrapperClass }}">
            <div class="nav {{$navClass}}" id="{{ $hostId }}" role="tablist">
                @stack('titles')
            </div>
        </{{ $navWrapperElement }}>
    @else
        <div class="nav {{$navClass}}" id="{{ $hostId }}" role="tablist">
            @stack('titles')
        </div>
    @endif

    <div class="tab-content" id="{{ $hostId }}Content">
        @stack('contents')
    </div>
</div>

