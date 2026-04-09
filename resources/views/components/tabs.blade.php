@props(['tabs' => [], 'active' => null])

<div x-data="{ activeTab: '{{ $active ?? ($tabs[0]['id'] ?? '') }}' }">
    <div class="border-b border-slate-200 dark:border-slate-700">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            @foreach ($tabs as $tab)
                <button @click="activeTab = '{{ $tab['id'] }}'"
                    :class="{ 'border-indigo-500 text-indigo-600 dark:text-indigo-400': activeTab === '{{ $tab['id'] }}', 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 dark:text-slate-400 dark:hover:text-slate-300': activeTab !== '{{ $tab['id'] }}' }"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition">
                    @if (isset($tab['icon']))
                        {!! $tab['icon'] !!}
                    @endif
                    {{ $tab['label'] }}
                </button>
            @endforeach
        </nav>
    </div>

    <div class="mt-6">
        @foreach ($tabs as $tab)
            <div x-show="activeTab === '{{ $tab['id'] }}'" x-transition>
                {{ $tab['content'] ?? '' }}
            </div>
        @endforeach
    </div>
</div>
