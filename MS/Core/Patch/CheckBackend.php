<?php

namespace MS\Core\Patch;

use Closure;

class CheckBackend
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
       // dd(session('user'));
       
        if(!$request->session()->has('user')){
           


            if($request->is('admin/*')){

    if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }
    return redirect()->action("\B\Users\Controller@login_form");  

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

        //check admin

        $user=session('user');
     
       if(array_key_exists('SuperAdmin', $user)){

// dd($user);
        //$use['SuperAdmin']=0;
        if(!$user['SuperAdmin'])

        {
           if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }
                return redirect()->action("\B\Users\Controller@login_form");  
               //  return response()->json($array, $status);

        }


       }else{

               if(array_key_exists('_', $request->all())){

                    $status=422;
            $array=[
                    'msg'=>"Access denied",
                    //'redirectData'=>action('\B\TMS\Controller@indexData'),
                    
                ];

    
         return response()->json($array, $status);

            }
                return redirect()->action("\B\Users\Controller@login_form");  
                // return response()->json($array, $status);
       }




        return $next($request);
    }
}
