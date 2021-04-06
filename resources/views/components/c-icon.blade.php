@props(['icon'])
<svg {{ $attributes->merge(['class'=>'c-icon']) }}>
    <use xlink:href="{{ asset(sprintf('assets/icons/coreui/free-symbol-defs.svg#cui-%s', $icon)) }}"></use>
</svg>
