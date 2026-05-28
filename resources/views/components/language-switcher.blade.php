@php
    use App\Enums\Language;
    $enabled = Language::enabledLanguages();
    $current = app()->getLocale();
@endphp

<div class="flex items-center gap-1">
    @foreach($enabled as $lang)
        <a href="{{ locale_path($lang->value) }}"
           dir="{{ $lang->direction() }}"
           class="{{ $lang->value === $current
               ? 'bg-white/20 text-white font-semibold'
               : 'text-indigo-200 hover:bg-white/10 hover:text-white' }}
               px-2.5 py-1 rounded-md text-xs transition">
            {{ $lang->label() }}
        </a>
    @endforeach
</div>
