<?php

namespace MS\Core\Patch;

use Closure;

class CheckAgency
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



        $type=explode('/',$request->path())[0];
        $adminType='admin';
       
        if(!$request->session()->has('user')){
           


            if($request->is('admin/*')){
  
    return redirect()->action("\B\Users\Controller@login_form");  

            }else{

              
            return redirect()->action("\B\APanel\Controller@login_form");


            }

         
        }


        return $next($request);
    }
}
