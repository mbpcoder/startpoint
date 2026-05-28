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
<body class="min-h-full bg-gray-100 font-sans text-gray-800 antialiased flex flex-col">

    <header class="bg-indigo-700 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <a href="{{ lroute('home') }}" class="text-xl font-bold tracking-tight hover:text-indigo-100 transition">
                {{ config('app.name', 'وبلاگ') }}
            </a>
            <div class="flex items-center gap-4">
                <x-language-switcher />
                <nav class="flex items-center gap-4 text-sm">
                    <a href="{{ route('login') }}" class="text-indigo-200 hover:text-white transition">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-4 py-1.5 rounded-full text-sm font-medium hover:bg-indigo-50 transition">{{ __('Register') }}</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center py-12 px-4">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-4 text-center text-sm text-gray-400">
            {{ __('Free to use with attribution.') }}
        </div>
    </footer>

</body>
</html>
