@props([
    'id',
    'navClass' => 'nav-tabs',
    'navWrapperElement' => false,
    'navWrapperClass' => '',
])

<div {{ $attributes }}>
    @if($navWrapperElement)
        <{{ $navWrapperElement }} class="{{ $navWrapperClass }}">
            <div class="nav {{$navClass}}" id="{{ $id }}" role="tablist">
                @stack('titles')
            </div>
        </{{ $navWrapperElement }}>
    @else
        <div class="nav {{$navClass}}" id="{{ $id }}" role="tablist">
            @stack('titles')
        </div>
    @endif

    <div class="tab-content" id="{{ $id }}Content">
        @stack('contents')
    </div>
</div>

