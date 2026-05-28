<?php

namespace App\Http\Middleware;

use App\Enums\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $this->resolveLocale($request);

        app()->setLocale($locale);
        Cookie::queue('locale', $locale, 60 * 24 * 365);

        if (auth()->check() && auth()->user()->locale !== $locale) {
            auth()->user()->updateQuietly(['locale' => $locale]);
        }

        return $next($request);
    }

    private function resolveLocale(Request $request): string
    {
        $default  = config('app.locale');
        $enabled  = array_map(fn($l) => $l->value, Language::enabledLanguages());

        // 1. URL prefix takes highest priority
        $segment = $request->segment(1);
        if ($segment && in_array($segment, $enabled)) {
            return $segment;
        }

        // 2. Logged-in user's saved preference
        if (auth()->check()) {
            $userLocale = auth()->user()->locale;
            if ($userLocale && in_array($userLocale, $enabled)) {
                return $userLocale;
            }
        }

        // 3. Cookie
        $cookie = $request->cookie('locale');
        if ($cookie && in_array($cookie, $enabled)) {
            return $cookie;
        }

        return $default;
    }
}
