@props(['headers' => [], 'data' => [], 'emptyMessage' => 'Tidak ada data.'])

<x-table-container>
    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
        <thead class="bg-slate-50 dark:bg-slate-900/50">
            <tr>
                @foreach ($headers as $header)
                    <th
                        class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase {{ $header['class'] ?? '' }}">
                        {{ $header['label'] }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
            @forelse($data as $row)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                    @foreach ($row as $cell)
                        <td class="px-6 py-4 text-sm {{ $cell['class'] ?? 'text-slate-700 dark:text-slate-300' }}">
                            {{ $cell['content'] }}
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="px-6 py-4 text-center text-slate-500 dark:text-slate-400">
                        {{ $emptyMessage }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-table-container>
