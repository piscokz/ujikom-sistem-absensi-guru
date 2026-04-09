@props(['label', 'type' => 'text', 'placeholder' => null, 'required' => false])

<div>
    <x-input-label for="{{ $attributes->get('id') }}" value="{{ $label }}"
        class="text-sm font-medium text-slate-700 dark:text-slate-300" />
    <x-text-input
        {{ $attributes->merge([
            'class' =>
                'block mt-1 w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition',
            'type' => $type,
            'placeholder' => $placeholder,
            'required' => $required,
        ]) }} />
    <x-input-error :messages="$errors->get($attributes->get('name'))" class="mt-2" />
</div>
