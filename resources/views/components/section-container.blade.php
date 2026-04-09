@props(['maxWidth' => 'max-w-7xl', 'padding' => 'px-4 sm:px-6 lg:px-8', 'spacing' => 'space-y-6'])

<div class="{{ $maxWidth }} mx-auto {{ $padding }} {{ $spacing }}">
    {{ $slot }}
</div>
