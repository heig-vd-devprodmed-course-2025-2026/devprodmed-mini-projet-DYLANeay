<x-default-layout>
    <x-slot:title>
        {{ __('reports.admin.title') }}
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        {{ __('reports.admin.title') }}
    </h1>

    @forelse ($posts as $post)
        <div class="mt-6 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ url('/posts/' . $post->id) }}"
                        class="text-lg font-semibold text-teal-600 dark:text-purple-400 hover:underline">
                        {{ __('reports.admin.view_post') }}
                    </a>
                    <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('reports.admin.by') }} {{ $post->user->name }}
                    </span>
                </div>
                <span class="px-2 py-1 text-sm font-bold bg-red-100 text-red-700 rounded dark:bg-red-900 dark:text-red-300">
                    {{ trans_choice('reports.admin.pending_count', $post->pending_reports_count) }}
                </span>
            </div>

            <p class="mt-2 text-gray-600 dark:text-gray-300 text-sm">
                {{ Str::limit($post->content, 100) }}
            </p>

            <div class="mt-3 space-y-1">
                @foreach ($post->reports as $report)
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-medium">{{ $report->user->name }}</span>
                        @if ($report->reason)
                            — {{ $report->reason }}
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="mt-6 text-gray-500 dark:text-gray-400">{{ __('reports.admin.empty') }}</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-default-layout>
