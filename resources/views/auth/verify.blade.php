@extends('layouts.app')

@section('title', 'تأیید ایمیل | ' . config('app.name'))

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-sm p-8 text-center">

        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>

        <h2 class="text-xl font-bold text-gray-900 mb-2">ایمیل خود را تأیید کنید</h2>

        @if(session('resent'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 mb-5 text-sm">
                لینک تأیید جدید به آدرس ایمیل شما ارسال شد.
            </div>
        @endif

        <p class="text-gray-500 text-sm mb-6 leading-relaxed">
            پیش از ادامه، لطفاً ایمیل خود را بررسی کنید و روی لینک تأیید کلیک کنید.
            <br>
            اگر ایمیل را دریافت نکرده‌اید،
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                ارسال مجدد لینک تأیید
            </button>
        </form>

    </div>
</div>
@endsection
