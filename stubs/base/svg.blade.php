@props(['name'])

<svg {{ $attributes }}>
    <use xlink:href="{{ mix(config('svg.path')) }}#{{ $name }}"/>
</svg>
