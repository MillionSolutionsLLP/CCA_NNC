<?php

namespace MS\Core\Patch;

use Closure;

class CheckAgencyAdmin
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
        $userType='agency';
        $adminType='adminType';
       
        if(!$request->session()->has('user')){
           


            if($request->is( $userType.'/*')){
  
    return redirect()->action("\B\APanel\Controller@login_form");  

            } elseif ( $request->is( $adminType.'/*') ){

              
            return redirect()->action("\B\APanel\Controller@login_form");


            }else{

                return redirect()->action("\B\APanel\Controller@login_form");  

            }

         
        }


        return $next($request);
    }
}
