@props(['mobileView', 'desktopView'])

{{-- Tampilan Mobile --}}
<div class="lg:hidden">
    {{ $mobileView }}
</div>

{{-- Tampilan Desktop --}}
<div class="hidden lg:block">
    {{ $desktopView }}
</div>
