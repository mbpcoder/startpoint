@extends('layouts.app')

@section('title', __('Set New Password') . ' | ' . config('app.name'))

@section('content')
<div class="w-full max-w-md">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('Set New Password') }}</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8">
        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email address') }}</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                       required autocomplete="email" autofocus
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('New Password') }}</label>
                <input id="password" type="password" name="password"
                       required autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       required autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg text-sm font-medium transition">
                {{ __('Save Password') }}
            </button>

        </form>
    </div>

</div>
@endsection
