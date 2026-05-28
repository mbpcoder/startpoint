@extends('layouts.main')

@section('title', $post->title . ' | ' . config('app.name'))

@section('content')

    {{-- Post --}}
    <article class="bg-white rounded-xl shadow-sm p-8 mb-8">

        <h1 class="text-2xl font-bold text-gray-900 mb-3">{{ $post->title }}</h1>

        <div class="flex items-center gap-3 text-sm text-gray-400 mb-6 pb-6 border-b border-gray-100">
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

        <div class="prose prose-gray max-w-none leading-loose text-gray-700">
            {!! $post->body !!}
        </div>

    </article>

    {{-- Related posts --}}
    @if($related->isNotEmpty())
    <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">{{ __('Related Posts') }}</h2>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            @foreach($related as $rel)
                <a href="{{ lroute('posts.show', $rel->id) }}"
                   class="block border border-gray-100 rounded-lg p-4 hover:border-indigo-200 hover:bg-indigo-50 transition">
                    <h3 class="font-medium text-gray-800 text-sm mb-1 line-clamp-2">{{ $rel->title }}</h3>
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        @if($rel->author)
                            <span>{{ $rel->author->name }}</span>
                            <span>&middot;</span>
                        @endif
                        <span>{{ $rel->published_at->format('Y/m/d') }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Comments --}}
    @php $approvedComments = $post->comments->where('approved', true); @endphp

    <section class="bg-white rounded-xl shadow-sm p-8 mb-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-6">
            {{ __('Comments') }}
            @if($approvedComments->count())
                <span class="text-sm font-normal text-gray-400">({{ $approvedComments->count() }})</span>
            @endif
        </h2>

        @forelse($approvedComments as $comment)
            <div class="border-b border-gray-100 last:border-0 pb-5 mb-5 last:pb-0 last:mb-0">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-medium text-gray-700 text-sm">{{ $comment->author_name }}</span>
                    <span class="text-xs text-gray-400">{{ $comment->created_at->format('Y/m/d') }}</span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $comment->body }}</p>
            </div>
        @empty
            <p class="text-gray-400 text-sm">{{ __('No comments yet.') }}</p>
        @endforelse
    </section>

    {{-- Comment form --}}
    <section class="bg-white rounded-xl shadow-sm p-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-6">{{ __('Leave a comment') }}</h2>

        @if(session('comment_success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 mb-6 text-sm">
                {{ session('comment_success') }}
            </div>
        @endif

        <form method="POST" action="{{ lroute('comments.store', $post->id) }}" class="space-y-5">
            @csrf

            <div>
                <label for="author_name" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Name') }} <span class="text-red-500">*</span>
                </label>
                <input type="text" id="author_name" name="author_name"
                       value="{{ old('author_name') }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('author_name') border-red-400 @enderror">
                @error('author_name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Email') }} <span class="text-gray-400 text-xs">{{ __('(optional)') }}</span>
                </label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Comment') }} <span class="text-red-500">*</span>
                </label>
                <textarea id="body" name="body" required rows="5"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('body') border-red-400 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-1">
                <p class="text-xs text-gray-400">{{ __('Your comment will appear after approval.') }}</p>
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition">
                    {{ __('Submit comment') }}
                </button>
            </div>

        </form>
    </section>

@endsection
