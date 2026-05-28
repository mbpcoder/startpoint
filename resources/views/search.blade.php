@extends('layouts.main')

@section('title', $q ? __('Search') . ': ' . $q . ' | ' . config('app.name') : __('Search') . ' | ' . config('app.name'))

@section('content')

    <div class="mb-6">
        <h1 class="text-xl font-bold text-gray-800">
            @if($q)
                {{ __('Search results for: :query', ['query' => $q]) }}
            @else
                {{ __('Search') }}
            @endif
        </h1>
        @if($q)
            <p class="text-sm text-gray-400 mt-1">{{ __(':count results found', ['count' => $posts->total()]) }}</p>
        @endif
    </div>

    @if($posts->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-12 text-center text-gray-400">
            <p class="text-lg">{{ __('No results found.') }}</p>
            @if($q)
                <p class="text-sm mt-2">{{ __('Try another search term.') }}</p>
            @endif
        </div>
    @endif

    @foreach($posts as $post)
        <article class="bg-white rounded-xl shadow-sm p-6 mb-6 hover:shadow-md transition">

            <h2 class="text-xl font-bold mb-2">
                <a href="{{ lroute('posts.show', $post->id) }}"
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
                    <a href="{{ lroute('home', ['category' => $post->category->slug]) }}"
                       class="text-indigo-500 hover:text-indigo-700 transition">
                        {{ $post->category->name }}
                    </a>
                    <span>&middot;</span>
                @endif
                <span>{{ $post->created_at->format('Y/m/d') }}</span>
                <span>&middot;</span>
                <span>{{ __(':count min read', ['count' => $post->reading_time]) }}</span>
            </div>

            @if($post->summery)
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $post->summery }}</p>
            @else
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    {{ mb_substr(strip_tags($post->body), 0, 220) }}{{ mb_strlen(strip_tags($post->body)) > 220 ? '...' : '' }}
                </p>
            @endif

            <a href="{{ lroute('posts.show', $post->id) }}"
               class="inline-block text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                {{ __('Read more') }} &laquo;
            </a>

        </article>
    @endforeach

    @if($posts->hasPages())
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @endif

@endsection
