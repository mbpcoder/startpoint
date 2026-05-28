@extends('layouts.app')

@section('title', 'ثبت‌نام | ' . config('app.name'))

@section('content')
<div class="w-full max-w-md">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">ایجاد حساب کاربری</h1>
        <p class="mt-2 text-sm text-gray-500">به ما بپیوندید</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8">
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">نام</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                       required autocomplete="name" autofocus
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-400 @enderror">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">آدرس ایمیل</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required autocomplete="email"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                <input id="password" type="password" name="password"
                       required autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">تکرار رمز عبور</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       required autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg text-sm font-medium transition">
                ثبت‌نام
            </button>

        </form>
    </div>

    <p class="text-center mt-6 text-sm text-gray-500">
        قبلاً ثبت‌نام کرده‌اید؟
        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition">وارد شوید</a>
    </p>

</div>
@endsection
