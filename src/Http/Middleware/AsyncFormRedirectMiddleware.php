<?php

namespace Mintellity\BladeComponents\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsyncFormRedirectMiddleware
{
    /**
     * Send redirect URL as JSON response if request comes from AJAX.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the request is not an AJAX request, we will just return the response
        if (! $request->ajax()) {
            return $next($request);
        }

        $response = $next($request);

        // If the response is not a redirect, we will just return the response
        if (! $response instanceof RedirectResponse) {
            return $response;
        }

        $targetUrl = $response->getTargetUrl();

        return response()->json(['redirect' => $targetUrl]);
    }
}
