<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginMiddleware
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
         if(!isset($_SESSION['username']))
        {
            // $user= Auth::user();
            // if($user->quyen==1)
        return $next($request);
        //  else
        // {
        // return redirect('admin/login');
        // }
       }
    else
    {
        return redirect()->back();
    }
    }
}
