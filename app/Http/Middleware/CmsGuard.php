<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CmsGuard
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
        if(Session::has('is_admin')){
            return $next($request);
        }else{
            redirect('user/signin');
        }
    }
}
