@props(['label', 'checked' => false])

<div class="flex items-center justify-between">
    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $label }}</span>
    <button type="button"
        {{ $attributes->merge([
            'class' =>
                'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2',
            'role' => 'switch',
            'aria-checked' => $checked ? 'true' : 'false',
        ]) }}
        :class="{ 'bg-indigo-600': {{ $checked ? 'true' : 'false' }}, 'bg-slate-200 dark:bg-slate-700': !
                {{ $checked ? 'true' : 'false' }} }">
        <span {{ $checked ? 'x-show="true"' : 'x-show="false"' }}
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-5">
        </span>
        <span {{ !$checked ? 'x-show="true"' : 'x-show="false"' }}
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0">
        </span>
    </button>
</div>
