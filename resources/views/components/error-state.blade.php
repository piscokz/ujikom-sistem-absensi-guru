@props(['title' => 'Terjadi Kesalahan', 'message', 'action' => null])

<div class="text-center py-12">
    <x-lucide-alert-triangle class="mx-auto h-12 w-12 text-red-400" />

    <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-slate-100">
        {{ $title }}
    </h3>

    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
        {{ $message }}
    </p>

    @if ($action)
        <div class="mt-6">
            {{ $action }}
        </div>
    @endif
</div>
