<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $authToken = $request->header('authorization');
        if (!$authToken) {
            return response()->json([
                'success' => false,
                'error' => 'Non è presente un api token'
            ]);
        }

        $apiToken = substr($authToken, 7);
        $user = User::where('api_token', $apiToken)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => "L'api token è errata"
            ]);
        }

        return $next($request);
    }
}
