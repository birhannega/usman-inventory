<?php

namespace App\Http\Middleware;
use app;
use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('locale')) {
            if (in_array(strtolower($request->locale), ['en', 'am'])) {
                echo $request->locale;
                session()->put('locale', $request->locale);
            } else {
                session()->put('locale', 'en');
            }
        }
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
            app()->setLocale(config('app.locale'));
        }

     return $next($request);
    }
}
