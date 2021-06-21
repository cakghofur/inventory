<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekAdmin
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
        if($request->session()->has('akun-admin')){

            return $next($request);
        }else{
            return redirect('/')->with('message','Silahkan Login terlebih dahulu!!');
        }
    }
}
