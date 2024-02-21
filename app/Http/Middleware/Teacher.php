<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->positions()->where('role', 'teacher')->exists()) {
            auth()->logout();
            // User is not authenticated as a super admin
            return redirect()->route('auth.sign-in')->withErrors(['لطفا برای دسترسی به صفحه مورد نظر، ابتدا وارد حساب کاربری خود شوید.']);
        }

        // User is authenticated as super admin
        return $next($request);
    }
}
