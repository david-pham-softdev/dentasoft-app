<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DentistEmailParameter
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
        $email = $request->user_email;
        $user = User::where('email', $email)->first();
        if (!$user->hasAnyRoles('Dentist')) {
            return response()->json([
                'message' => 'The user email does not have permission. Email must be a dentist.',
            ], 401);
        }
        return $next($request);
    }
}
