<?php

namespace App\Http\Middleware;
Use Alert;
use Closure;

class AuthMiddleware
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
        if (empty($request->session()->get('session'))) {
            alert()->error('thông báo', 'bạn phải đăng nhập mới đăng được bài');
            return redirect('/posts/login');
        }
        return $next($request);
    }
}
