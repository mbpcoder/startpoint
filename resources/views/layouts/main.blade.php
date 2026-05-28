<!DOCTYPE html>
<html dir="rtl" lang="fa" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'وبلاگ'))</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-full bg-gray-50 font-sans text-gray-800 antialiased">

    <header class="bg-indigo-700 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold tracking-tight hover:text-indigo-100 transition">
                {{ config('app.name', 'وبلاگ') }}
            </a>
            <nav class="flex items-center gap-5 text-sm">
                @auth
                    <span class="text-indigo-200">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-indigo-200 hover:text-white transition">خروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-indigo-200 hover:text-white transition">ورود</a>
                    <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-4 py-1.5 rounded-full text-sm font-medium hover:bg-indigo-50 transition">ثبت‌نام</a>
                @endauth
            </nav>
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
            استفاده با ذکر منبع بلامانع است.
        </div>
    </footer>

</body>
</html>
