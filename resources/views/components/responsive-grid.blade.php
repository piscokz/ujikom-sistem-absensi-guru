@props(['cols' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3', 'gap' => 'gap-4'])

<div class="grid {{ $cols }} {{ $gap }}">
    {{ $slot }}
</div>
