<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAdminMiddleware
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
        if(isset($_SESSION['username']))
        {
            if($_SESSION['role']==0)
               {
                return redirect('');
               } 
            // $user= Auth::user();
            // if($user->quyen==1)
             else
               {
                return $next($request);
                }
        //  else
        // {
        // return redirect('admin/login');
        // }
    }

    else
    {
        return redirect('login');
    }
    }
}
