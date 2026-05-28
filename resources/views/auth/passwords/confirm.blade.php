@extends('layouts.app')

@section('title', 'تأیید رمز عبور | ' . config('app.name'))

@section('content')
<div class="w-full max-w-md">

    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">تأیید رمز عبور</h1>
        <p class="mt-2 text-sm text-gray-500">برای ادامه، رمز عبور خود را تأیید کنید</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-8">
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                <input id="password" type="password" name="password"
                       required autocomplete="current-password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between gap-3">
                <button type="submit"
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg text-sm font-medium transition">
                    تأیید
                </button>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-indigo-600 hover:text-indigo-800 transition whitespace-nowrap">
                        فراموشی رمز عبور
                    </a>
                @endif
            </div>

        </form>
    </div>

</div>
@endsection
