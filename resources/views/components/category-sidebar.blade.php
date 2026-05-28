@props(['categories'])

<div class="bg-white rounded-xl shadow-sm p-5">
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
