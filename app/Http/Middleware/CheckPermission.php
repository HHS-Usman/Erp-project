<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->user()->hasPermissionTo($permission)) {
            return $next($request);
        }

        // $sadFace = '😢'; // Unicode character for a sad face

        // // Replace with the actual URL of your GIF

        // $content = '<div style="color: dark; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Access denied ' . $sadFace . ' </div>';
        // $response = new Response($content, 403);
        // $response = new Response($content, 403);
        abort(403, 'Access denied');

    }
}
