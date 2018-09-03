@extends('L.root_BackEnd')



@section('title')

{{ env('APP_V_NAME', 'MS Cloud System')}}


for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection


@section('content')


   <span class="col-lg-12 text-center"><br>
                       <code>Powered by {{env("APP_V_NAME",'MS System For Cloud ')}}</code>
                        </span> 
    <div class="container">
        <div class="row">
     

            <div class="col-md-4 col-md-offset-4" style=" transform: translateY(20%);">
                <div class="login-panel panel panel-info" style="-webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.5);
-moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.5);
box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.5);">


                    <div class="panel-heading">
                        <span  class="row" >
                        
                        <p class="col-md-12 text-center">
                            
                            <img   style="max-height: 40px;" src="{{asset('images/'.env('APP_V_LOGO_LG','Ms_CCA.png'))}}">
                        </p>

                                    
                    <p class="col-lg-12 text-center ">

                   
                  
                        <h5 class="panel-title  text-center">Sign in with your Agency Account



                        </h5>

                    </p>
                        
                        </span>
                    </div>


                    <div class="panel-body">
                        <br>
                        {!! Form::open(['route' => 'AMS.Portal.Login','method' => 'post','files' => true,'class'=>'ms-form']) !!}
                            <fieldset class="col-lg-8 col-lg-offset-2">
                                <div class="form-group">

                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                                       <input class="form-control" placeholder="Enter Username" name="UserName" type="text" autofocus>
                      
                                    </div>

                                </div>

                                 <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                                <input class="form-control" placeholder="Enter Password" name="Password" type="password" value="">
                      
                                    </div>

                                   
                                </div>
                             
          
                                <!-- Change this to a button or input when using this as a form --><div class="col-lg-8 col-lg-offset-2">
                                    

                                <button  class="btn btn-sm btn-success btn-block ms-form-btn">Login <i class="fa fa-sign-out " aria-hidden="true"></i></button>
                                </div>
                            </fieldset>
                       {!! Form::close() !!}

                   </div>

<br>
                   <div class="panel-footer text-center">


                

                     
                        <span >We provide support 365 days in year.</span >
                        <br><i class="fa fa-envelope-o" aria-hidden="true"><b > : help@millionsllp.com</b></i>   |
                         <i class="fa fa-phone-square " aria-hidden="true"><b > : +91 7990563470</b></i> 
                     <br><i class="fa fa-copyright" aria-hidden="true"></i> {{date('Y')}}-{{date('Y')+1}},All rights reserved By<a href="http://www.millionsllp.com"> <b>Million Solutions LLP</b> </a>.
                      
                         
                    </div>
</div>


</div>
</div>
</div>





@endsection
