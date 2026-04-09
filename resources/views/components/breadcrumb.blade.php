@props(['items' => []])

@if (count($items) > 0)
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-100">
                    <svg class="w-3 h-3 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2A1 1 0 0 0 1 10h2v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0 1-1v-1h2v1a1 1 0 0 0 1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-8h2a1 1 0 0 0 .707-1.707Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            @foreach ($items as $index => $item)
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-slate-400 mx-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        @if ($index === count($items) - 1)
                            <span
                                class="ml-1 text-sm font-medium text-slate-500 md:ml-2 dark:text-slate-400">{{ $item['label'] }}</span>
                        @else
                            <a href="{{ $item['href'] }}"
                                class="ml-1 text-sm font-medium text-slate-700 hover:text-slate-900 md:ml-2 dark:text-slate-400 dark:hover:text-slate-100">{{ $item['label'] }}</a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
@endif
