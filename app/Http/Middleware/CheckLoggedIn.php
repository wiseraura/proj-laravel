<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoggedIn
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
        if(Auth::check()) {
            return redirect()->route('admin.user')->with(['alert' => [
                'type' => 'warning',
                'title' => 'Từ chối truy cập!',
                'content' => 'Bạn không có quyền truy cập vào trang này.'
            ]]);
        } else {
            return $next($request);
        }
    }
}
