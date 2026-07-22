<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_approved != 1) {
            Auth::logout(); // তাকে ফোর্সফুলি লগআউট করে দিন

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // লগইন পেজে একটি লাল এরর মেসেজ সহ ফেরত পাঠান
            return redirect()->route('login')->withErrors([
                'email' => 'Your account is pending admin approval. Please wait for confirmation.'
            ]);
        }
        return $next($request);
    }
}
