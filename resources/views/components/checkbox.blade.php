@props(['label', 'checked' => false])

<div class="flex items-center">
    <input
        {{ $attributes->merge([
            'type' => 'checkbox',
            'class' =>
                'h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 dark:border-slate-600 rounded transition',
        ]) }}
        {{ $checked ? 'checked' : '' }}>
    <label {{ $attributes->merge(['class' => 'ml-2 block text-sm text-slate-900 dark:text-slate-100']) }}>
        {{ $label }}
    </label>
</div>
