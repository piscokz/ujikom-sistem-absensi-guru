@props(['label', 'name', 'accept' => null, 'multiple' => false, 'required' => false])

<div>
    <x-input-label for="{{ $name }}" value="{{ $label }}"
        class="text-sm font-medium text-slate-700 dark:text-slate-300" />
    <div
        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-600 border-dashed rounded-lg hover:border-slate-400 dark:hover:border-slate-500 transition">
        <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                aria-hidden="true">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-slate-600 dark:text-slate-400">
                <label for="{{ $name }}"
                    class="relative cursor-pointer bg-white dark:bg-slate-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Unggah file</span>
                    <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only"
                        {{ $accept ? 'accept="' . $accept . '"' : '' }} {{ $multiple ? 'multiple' : '' }}
                        {{ $required ? 'required' : '' }}>
                </label>
                <p class="pl-1">atau drag and drop</p>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">
                @if ($accept)
                    {{ $accept }} hingga 10MB
                @else
                    Semua file hingga 10MB
                @endif
            </p>
        </div>
    </div>
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
