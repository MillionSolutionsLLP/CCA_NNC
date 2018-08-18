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
           

            //dd($request->all());
            if($request->is( $userType.'/*')){
            
            if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }
            return redirect()->action("\B\APanel\Controller@login_form");  

            } elseif ( $request->is( $adminType.'/*') ){

            if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }
            return redirect()->action("\B\APanel\Controller@login_form");


            }else{

                if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }

                return redirect()->action("\B\APanel\Controller@login_form");  

            }

         
        }


        return $next($request);
    }
}
