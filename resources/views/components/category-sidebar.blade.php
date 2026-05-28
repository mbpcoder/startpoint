@props(['categories'])

{{-- Search --}}
<div class="bg-white rounded-xl shadow-sm p-5 mb-4">
    <h3 class="font-semibold text-gray-900 text-sm uppercase tracking-wide mb-3 pb-2 border-b border-gray-100">
        جستجو
    </h3>
    <form method="GET" action="{{ route('search') }}">
        <div class="flex gap-2">
            <input type="text"
                   name="q"
                   value="{{ request('q') }}"
                   placeholder="جستجو در مطالب..."
                   class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-lg text-sm transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </button>
        </div>
    </form>
</div>

{{-- Categories --}}
<div class="bg-white rounded-xl shadow-sm p-5 mb-4">
    <h3 class="font-semibold text-gray-900 text-sm uppercase tracking-wide mb-3 pb-2 border-b border-gray-100">
        دسته‌بندی‌ها
    </h3>
    <ul class="space-y-1.5">
        <li>
            <a href="/"
               class="{{ request()->is('/') && !request()->segment(1) ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }} text-sm transition block py-0.5">
                همه مطالب
            </a>
        </li>
        @foreach($categories as $category)
            <li>
                <a href="/{{ $category->slug }}"
                   class="{{ request()->segment(1) === $category->slug ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }} text-sm transition block py-0.5">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

{{-- Newsletter --}}
<div class="bg-indigo-50 rounded-xl shadow-sm p-5">
    <h3 class="font-semibold text-gray-900 text-sm uppercase tracking-wide mb-1 pb-2 border-b border-indigo-100">
        خبرنامه
    </h3>
    <p class="text-xs text-gray-500 mb-3">برای دریافت جدیدترین مطالب عضو شوید.</p>

    @if(session('newsletter_success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-3 py-2 text-xs mb-3">
            {{ session('newsletter_success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('newsletter.subscribe') }}">
        @csrf
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               placeholder="ایمیل شما"
               required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
        @error('email')
            <p class="text-xs text-red-500 mb-2">{{ $message }}</p>
        @enderror
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg text-sm font-medium transition">
            عضویت
        </button>
    </form>
</div>
