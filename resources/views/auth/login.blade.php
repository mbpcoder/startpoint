@extends('layouts.app')

@section('title', __('Login') . ' | ' . config('app.name'))

@section('content')
<div class="w-full max-w-md">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('Sign in to your account') }}</h1>
        <p class="mt-2 text-sm text-gray-500">{{ __('Welcome back') }}</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8">

        @if(session('status'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 mb-6 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                <input id="password" type="password" name="password"
                       required autocomplete="current-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    {{ __('Remember me') }}
                </label>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg text-sm font-medium transition">
                {{ __('Login') }}
            </button>

        </form>
    </div>

    <p class="text-center mt-6 text-sm text-gray-500">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition">{{ __('Sign up') }}</a>
    </p>

</div>
@endsection
