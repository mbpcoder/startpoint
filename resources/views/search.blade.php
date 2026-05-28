@extends('layouts.main')

@section('title', $q ? 'جستجو: ' . $q . ' | ' . config('app.name') : 'جستجو | ' . config('app.name'))

@section('content')

    <div class="mb-6">
        <h1 class="text-xl font-bold text-gray-800">
            @if($q)
                نتایج جستجو برای: <span class="text-indigo-600">{{ $q }}</span>
            @else
                جستجو
            @endif
        </h1>
        @if($q)
            <p class="text-sm text-gray-400 mt-1">{{ $posts->total() }} نتیجه یافت شد</p>
        @endif
    </div>

    @if($posts->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-12 text-center text-gray-400">
            <p class="text-lg">نتیجه‌ای یافت نشد.</p>
            @if($q)
                <p class="text-sm mt-2">عبارت دیگری جستجو کنید.</p>
            @endif
        </div>
    @endif

    @foreach($posts as $post)
        <article class="bg-white rounded-xl shadow-sm p-6 mb-6 hover:shadow-md transition">

            <h2 class="text-xl font-bold mb-2">
                <a href="{{ route('posts.show', $post->id) }}"
                   class="text-gray-900 hover:text-indigo-600 transition">
                    {{ $post->title }}
                </a>
            </h2>

            <div class="flex items-center gap-3 text-sm text-gray-400 mb-4">
                @if($post->author)
                    <span>{{ $post->author->name }}</span>
                    <span>&middot;</span>
                @endif
                @if($post->category)
                    <a href="/{{ $post->category->slug }}"
                       class="text-indigo-500 hover:text-indigo-700 transition">
                        {{ $post->category->name }}
                    </a>
                    <span>&middot;</span>
                @endif
                <span>{{ $post->created_at->format('Y/m/d') }}</span>
                <span>&middot;</span>
                <span>{{ $post->reading_time }} دقیقه مطالعه</span>
            </div>

            @if($post->summery)
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $post->summery }}</p>
            @else
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ mb_substr(strip_tags($post->body), 0, 220) }}{{ mb_strlen(strip_tags($post->body)) > 220 ? '...' : '' }}
                </p>
            @endif

            <a href="{{ route('posts.show', $post->id) }}"
               class="inline-block text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                ادامه مطلب &laquo;
            </a>

        </article>
    @endforeach

    @if($posts->hasPages())
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @endif

@endsection
