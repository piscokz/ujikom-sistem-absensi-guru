@props([
    'id',
    'title' => 'Konfirmasi',
    'message' => 'Apakah Anda yakin?',
    'confirmText' => 'Ya',
    'cancelText' => 'Batal',
    'confirmColor' => 'red',
])

<x-modal :id="$id" :title="$title" size="max-w-md">
    <div class="mt-4">
        <p class="text-sm text-slate-600 dark:text-slate-400">
            {{ $message }}
        </p>
    </div>

    <div class="mt-6 flex justify-end gap-3">
        <button type="button" @click="$dispatch('close-modal', { id: '{{ $id }}' })"
            class="inline-flex items-center px-4 py-2 bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
            {{ $cancelText }}
        </button>
        <button type="button" @click="$dispatch('confirm-modal', { id: '{{ $id }}' })"
            class="inline-flex items-center px-4 py-2 bg-{{ $confirmColor }}-600 hover:bg-{{ $confirmColor }}-700 border border-transparent rounded-lg text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{ $confirmColor }}-500 transition">
            {{ $confirmText }}
        </button>
    </div>
</x-modal>
