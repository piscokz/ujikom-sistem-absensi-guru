@props(['action' => null, 'method' => 'GET', 'placeholder' => 'Cari...', 'filters' => []])

<form method="{{ $method }}" action="{{ $action ?? request()->url() }}"
    class="bg-white dark:bg-slate-800 rounded-2xl shadow-md p-4 sm:p-6 space-y-4">
    <div class="flex flex-col lg:flex-row lg:items-end gap-4">
        {{-- Search Input --}}
        <div class="flex-1">
            <label for="search"
                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Pencarian</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100 placeholder-slate-500 dark:placeholder-slate-400 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="{{ $placeholder }}">
            </div>
        </div>

        {{-- Additional Filters --}}
        @if (count($filters) > 0)
            @foreach ($filters as $filter)
                <div class="w-full lg:w-auto">
                    <label for="{{ $filter['name'] }}"
                        class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">{{ $filter['label'] }}</label>
                    @if ($filter['type'] === 'select')
                        <select name="{{ $filter['name'] }}" id="{{ $filter['name'] }}"
                            class="block w-full px-3 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            @if (isset($filter['placeholder']))
                                <option value="">{{ $filter['placeholder'] }}</option>
                            @endif
                            @foreach ($filter['options'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ request($filter['name']) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    @elseif($filter['type'] === 'date')
                        <input type="date" name="{{ $filter['name'] }}" id="{{ $filter['name'] }}"
                            value="{{ request($filter['name']) }}"
                            class="block w-full px-3 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    @endif
                </div>
            @endforeach
        @endif

        {{-- Action Buttons --}}
        <div class="flex gap-2">
            <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Cari
            </button>
            @if (request()->hasAny(['search']) || count($filters) > 0)
                <a href="{{ request()->url() }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 text-sm font-medium rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reset
                </a>
            @endif
        </div>
    </div>
</form>
