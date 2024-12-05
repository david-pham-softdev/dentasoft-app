<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('user_email') || !filter_var($request->user_email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => 'The user_email parameter is required and must be a valid email address.',
            ], 400); // 400 Bad Request
        }

        $email = $request->user_email;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'The email does not exist in our system.',
            ], 404); // 404 Not Found
        }

        Auth::setUser($user);

        return $next($request);
    }
}
