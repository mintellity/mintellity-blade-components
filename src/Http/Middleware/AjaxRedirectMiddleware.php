<?php

namespace Mintellity\BladeComponents\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AjaxRedirectMiddleware
{
    /**
     * Send redirect URL as JSON response if request comes from AJAX.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|JsonResponse
    {
        // If the request is not an AJAX request, we will just return the response
        if (!$request->ajax())
            return $next($request);

        $response = $next($request);

        // If the response is not a redirect, we will just return the response
        if (!$response instanceof RedirectResponse)
            return $response;

        $targetUrl = $response->getTargetUrl();

        return response()->json(['redirect' => $targetUrl]);
    }
}
