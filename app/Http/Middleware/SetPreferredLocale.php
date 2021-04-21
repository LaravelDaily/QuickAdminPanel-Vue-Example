<?php

namespace App\Http\Middleware;

use Closure;

class SetPreferredLocale
{
    public function handle($request, Closure $next)
    {
        $locales  = array_column(config('project.supported_languages'), 'short_code');
        $language = $request->getPreferredLanguage($locales);

        app()->setLocale($language);

        return $next($request);
    }
}
