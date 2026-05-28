<?php

use App\Enums\Language;

/**
 * Generate a locale-aware route URL.
 * Uses the current app locale to prepend the correct route name prefix.
 */
if (!function_exists('lroute')) {
    function lroute(string $name, mixed $parameters = [], bool $absolute = true): string
    {
        $locale  = app()->getLocale();
        $default = config('app.locale', 'fa');

        if ($locale === $default) {
            return route($name, $parameters, $absolute);
        }

        try {
            return route($locale . '.' . $name, $parameters, $absolute);
        } catch (\Symfony\Component\Routing\Exception\RouteNotFoundException) {
            return route($name, $parameters, $absolute);
        }
    }
}

/**
 * Return the current path stripped of any locale prefix,
 * then re-prefixed for the given target locale.
 */
if (!function_exists('locale_path')) {
    function locale_path(string $targetLocale): string
    {
        $default = config('app.locale', 'fa');
        $path    = '/' . ltrim(request()->path(), '/');
        $locales = array_map(fn($l) => $l->value, Language::enabledLanguages());

        // Strip current locale prefix
        foreach ($locales as $lv) {
            if ($path === '/' . $lv) { $path = '/'; break; }
            if (str_starts_with($path, '/' . $lv . '/')) {
                $path = substr($path, strlen('/' . $lv));
                break;
            }
        }

        // Re-add target prefix
        if ($targetLocale === $default) {
            return $path ?: '/';
        }

        return '/' . $targetLocale . ($path === '/' ? '' : $path);
    }
}

/**
 * Return the current path with any locale prefix stripped.
 */
if (!function_exists('clean_path')) {
    function clean_path(): string
    {
        $path    = '/' . ltrim(request()->path(), '/');
        $locales = array_map(fn($l) => $l->value, Language::enabledLanguages());

        foreach ($locales as $lv) {
            if ($path === '/' . $lv) return '/';
            if (str_starts_with($path, '/' . $lv . '/')) {
                return substr($path, strlen('/' . $lv));
            }
        }

        return $path;
    }
}
