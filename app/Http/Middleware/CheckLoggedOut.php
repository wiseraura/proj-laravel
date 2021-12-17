<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoggedOut
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
        if(!Auth::check()) {
            return redirect()->route('auth.login')->with(['alert' => [
                'type' => 'warning',
                'title' => 'Từ chối truy cập!',
                'content' => 'Bạn không có quyền truy cập. Hãy đăng nhập tài khoản Admin để truy cập trang này.'
            ]]);
        } elseif(!(Auth::user()->level === 'admin')) {
            return redirect()->route('auth.login')->with(['alert' => [
                'type' => 'warning',
                'title' => 'Từ chối truy cập!',
                'content' => 'Tài khoản của bạn không có quyền truy cập. Trang này chỉ dành cho tài khoản Admin.'
            ]]);
        } else {
            return $next($request);
        }
    }
}
