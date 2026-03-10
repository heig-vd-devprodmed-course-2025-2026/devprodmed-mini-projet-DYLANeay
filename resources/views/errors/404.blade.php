{{-- Custom 404 error page.
     Laravel automatically uses resources/views/errors/{status_code}.blade.php
     when an HTTP exception is thrown (e.g. abort(404) or Model::findOrFail()).
     No route or controller registration is needed. --}}

<x-default-layout>
    <x-slot:title>
        {{ __('ui.errors.404.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.errors.404.description') }}
    </x-slot>

    <div class="flex flex-col items-center justify-center py-20 text-center">
        <p class="text-8xl font-bold text-teal-600 dark:text-teal-400">404</p>

        <h1 class="mt-4 text-3xl font-bold text-slate-800 dark:text-slate-100">
            {{ __('ui.errors.404.heading') }}
        </h1>

        <p class="mt-2 text-lg text-slate-600 dark:text-slate-400">
            {{ __('ui.errors.404.message') }}
        </p>

        <a href="{{ url('/') }}"
            class="mt-8 inline-block rounded-md bg-teal-600 px-6 py-3 text-white transition hover:bg-teal-700 dark:bg-purple-900 dark:hover:bg-purple-800">
            {{ __('ui.errors.404.back_home') }}
        </a>
    </div>
</x-default-layout>
