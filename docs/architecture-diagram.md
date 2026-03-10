# Architecture Diagram: Views, Components, Routes & Slots

## Flow Overview

```
┌─────────────────────────────────────────────────────────────────────┐
│                         BROWSER REQUEST                             │
│                     GET /  or  GET /@dylan  or  GET /posts/3        │
└──────────────────────────────┬──────────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────────┐
│                        routes/web.php                               │
│                                                                     │
│  Route::get('/', closure)            → view('home', [...])          │
│  Route::get('/about', closure)       → view('about')                │
│  Route::get('/@{username}', ...)     → ProfileController@show       │
│  Route::resource('posts', ...)       → PostController (CRUD)        │
└──────────────────────────────┬──────────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────────┐
│                        CONTROLLER                                   │
│                                                                     │
│  Fetches data from Models (Post, User, Like)                        │
│  Returns:  return view('viewname', ['posts' => $posts]);            │
└──────────────────────────────┬──────────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────────┐
│                     VIEW  (e.g. home.blade.php)                     │
│                                                                     │
│  <x-default-layout>            ◄── opens the COMPONENT              │
│                                                                     │
│      <x-slot:title>            ◄── NAMED SLOT (goes to $title)      │
│          Page Title                                                  │
│      </x-slot>                                                       │
│                                                                     │
│      <x-slot:description>      ◄── NAMED SLOT (goes to $description)│
│          Meta desc                                                   │
│      </x-slot>                                                       │
│                                                                     │
│      <h1>Welcome</h1>          ◄── DEFAULT SLOT (goes to $slot)     │
│      @foreach($posts as $post)                                       │
│          <x-post-card :post="$post"/>  ◄── CHILD COMPONENT           │
│      @endforeach                                                     │
│                                                                     │
│  </x-default-layout>                                                 │
└──────────────────────────────┬──────────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────────┐
│          COMPONENT: components/default-layout.blade.php             │
│                                                                     │
│  <!DOCTYPE html>                                                     │
│  <html>                                                              │
│  <head>                                                              │
│      <title>{{ $title }} | {{ config('app.name') }}</title>          │
│             ^^^^^^^^                                                 │
│             Named slot injected here                                 │
│                                                                     │
│      <meta name="description" content="{{ $description }}">         │
│                                          ^^^^^^^^^^^^^^              │
│                                          Named slot injected here    │
│  </head>                                                             │
│  <body>                                                              │
│      <header>Nav bar</header>                                        │
│      <main>                                                          │
│          {{ $slot }}    ◄── DEFAULT SLOT: all content between        │
│                             <x-default-layout>...</x-default-layout> │
│                             that is NOT a named slot                  │
│      </main>                                                         │
│      <footer>...</footer>                                            │
│  </body>                                                             │
│  </html>                                                             │
└──────────────────────────────┬──────────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────────┐
│          COMPONENT: components/post-card.blade.php                  │
│                                                                     │
│  @props(['post'])   ◄── receives $post via :post="$post"            │
│                                                                     │
│  <article>                                                           │
│      {{ $post->user->firstname }}                                    │
│      {{ $post->content }}                                            │
│      {{ $post->likes->count() }} likes                               │
│  </article>                                                          │
│                                                                     │
│  (No slots — this is a "leaf" component, data via props only)        │
└─────────────────────────────────────────────────────────────────────┘
```

---

## Slot Mechanism Explained

```
                    ┌─────────────────────────┐
                    │   <x-default-layout>     │
                    └────────┬────────────────┘
                             │
              ┌──────────────┼──────────────────┐
              │              │                  │
              ▼              ▼                  ▼
      ┌──────────────┐ ┌──────────┐   ┌──────────────┐
      │ NAMED SLOT   │ │ NAMED    │   │ DEFAULT SLOT │
      │ $title       │ │ SLOT     │   │ $slot        │
      │              │ │ $desc.   │   │              │
      │ defined via: │ │          │   │ = everything │
      │ <x-slot:     │ │ <x-slot: │   │ between tags │
      │   title>     │ │   desc.> │   │ that is NOT  │
      │ </x-slot>    │ │ </x-slot>│   │ an <x-slot>  │
      └──────────────┘ └──────────┘   └──────────────┘
```

---

## Full Concrete Example: `GET /@dylan`

### 1. Route (`routes/web.php`)

```php
Route::get('/@{username}', [ProfileController::class, 'show'])
    ->where('username', '[a-zA-Z0-9_-]+');
```

### 2. Controller (`app/Http/Controllers/ProfileController.php`)

```php
public function show(string $username): View
{
    $user = User::where('username', $username)->firstOrFail();
    $posts = Post::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->with(['user', 'likes'])
        ->get();

    return view('profile', ['user' => $user, 'posts' => $posts]);
}
```

### 3. View (`resources/views/profile.blade.php`)

```blade
<x-default-layout>

    {{-- NAMED SLOT: $title --}}
    <x-slot:title>
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </x-slot>

    {{-- NAMED SLOT: $description --}}
    <x-slot:description>
        {{ __('ui.profile.description', ['username' => $user->username]) }}
    </x-slot>

    {{-- EVERYTHING BELOW IS THE DEFAULT SLOT: $slot --}}
    <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
    <p>{{ trans_choice('ui.profile.number_of_posts', count($posts)) }}</p>

    @foreach ($posts as $post)
        <x-post-card :post="$post" />   {{-- child component, no slots, just props --}}
    @endforeach

</x-default-layout>
```

### 4. What happens

- The **layout component** renders the full HTML page, injecting:
  - `$title` into the `<title>` tag
  - `$description` into the `<meta>` tag
  - `$slot` into the `<main>` content area
- The **post-card component** renders each post as a styled card using the `:post` prop

---

## Summary Table

| Concept | How it works in this app |
|---|---|
| **Route -> Controller** | Route maps URL to controller method (or closure) |
| **Controller -> View** | `return view('name', ['key' => $data])` passes data |
| **View -> Component** | `<x-component-name>` auto-resolves to `components/component-name.blade.php` |
| **Default slot (`$slot`)** | Everything between `<x-component>...</x-component>` that isn't a named slot |
| **Named slot (`$title`)** | Defined with `<x-slot:name>...</x-slot>`, accessed as `{{ $name }}` in component |
| **Props (`:post`)** | Passed as attributes, accessed with `@props(['post'])` in component |
