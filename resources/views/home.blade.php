<x-default-layout>
    <x-slot:title>
        {{ __('ui.home.title') }}
    </x-slot>

    {{-- Kind of a console.log in JS but in PHP : --}}
    {{--     @php dump($posts); @endphp --}}

    <x-slot:description>
        {{ __('ui.home.description') }}
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        {{ config('app.name') }}
    </h1>

    <p class="mt-4 dark:text-gray-300">
        {{ __('ui.home.introduction', ['app_name' => config('app.name')]) }}
    </p>

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            {{-- Cela fonctionne car $post nous a été donné par la route, puis on la passe au composant! --}}
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-default-layout>
