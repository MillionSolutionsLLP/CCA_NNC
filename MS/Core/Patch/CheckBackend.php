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

  
    return redirect()->action("\B\Users\Controller@login_form");  

            }else{

              
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
            $status=422;
            $array=[
                    'msg'=>[
                    'User access is not valid.',
                        

                    ],

                    

                ];
                return redirect()->action("\B\Users\Controller@login_form");  
                 return response()->json($array, $status);

        }


       }else{

                $status=422;
            $array=[
                    'msg'=>[
                    'User access is not valid.',
                        

                    ],

                    

                ];
                return redirect()->action("\B\Users\Controller@login_form");  
                 return response()->json($array, $status);
       }




        return $next($request);
    }
}
