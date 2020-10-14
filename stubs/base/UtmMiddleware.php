<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UtmMiddleware
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
        // If we change source, medium or content, we reset session data
        if (
            ($request->input('cog_reset') != '')
            OR ($request->input('utm_content') AND ($request->input('utm_content') != $request->session()->get('utm_content')))
            OR ($request->input('utm_medium') AND ($request->input('utm_medium') != $request->session()->get('utm_medium')))
            OR ($request->input('utm_campaign') AND ($request->input('utm_campaign') != $request->session()->get('utm_campaign')))
            OR ($request->input('utm_source') AND ($request->input('utm_source') != $request->session()->get('utm_source')))
        ) {
            $request->session()->forget('utm_content');
            $request->session()->forget('utm_campaign');
            $request->session()->forget('utm_source');
            $request->session()->forget('utm_medium');
        }

        if ($request->input('utm_content')) {
            $request->session()->put('utm_content', $request->input('utm_content'));
        }

        if ($request->input('utm_campaign')) {
            $request->session()->put('utm_campaign', $request->input('utm_campaign'));
        }

        if ($request->input('utm_source')) {
            $request->session()->put('utm_source', $request->input('utm_source'));
        }

        if ($request->input('utm_medium')) {
            $request->session()->put('utm_medium', $request->input('utm_medium'));
        }

        return $next($request);
    }
}
