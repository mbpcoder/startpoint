@php use App\Enums\Language; $lang = Language::tryFrom(app()->getLocale()) ?? Language::FA; @endphp
<!DOCTYPE html>
<html dir="{{ $lang->direction() }}" lang="{{ app()->getLocale() }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'وبلاگ'))</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-full bg-gray-50 font-sans text-gray-800 antialiased">

    <header class="bg-indigo-700 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <a href="{{ lroute('home') }}" class="text-xl font-bold tracking-tight hover:text-indigo-100 transition shrink-0">
                {{ config('app.name', 'وبلاگ') }}
            </a>
            <div class="flex items-center gap-4 flex-wrap justify-end">
                <x-language-switcher />
                <nav class="flex items-center gap-4 text-sm">
                    @auth
                        <span class="text-indigo-200">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-indigo-200 hover:text-white transition">{{ __('Logout') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-indigo-200 hover:text-white transition">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-4 py-1.5 rounded-full text-sm font-medium hover:bg-indigo-50 transition">{{ __('Register') }}</a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <main class="flex-1 min-w-0">
                @yield('content')
            </main>

            <aside class="lg:w-64 shrink-0">
                <x-category-sidebar :categories="$categories ?? collect()" />
            </aside>

        </div>
    </div>

    <footer class="border-t border-gray-200 mt-4">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-sm text-gray-400">
            {{ __('Free to use with attribution.') }}
        </div>
    </footer>

</body>
</html>
