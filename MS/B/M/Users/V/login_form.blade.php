@extends('L.root_BackEnd')



@section('title')

{{ env('APP_V_NAME', 'MS Cloud System')}}


for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection


@section('content')



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
                  
                        <h5 class="panel-title  text-center">Sign in with your Company Account



                        </h5>

                    </p>
                        
                        </span>
                    </div>


                    <div class="panel-body">
                        <br>
                        {!! Form::open(['action' => '\B\Users\Controller@login_post','method' => 'post','files' => true,'class'=>'ms-form']) !!}
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
                   <div class="panel-footer text-center" style="padding:0px;">


                   <table class="table " style="margin-bottom: 0px">

                     
                        <tr> <td colspan="2"><small> We greatly value your business. </small></td> </tr >
                        <tr> <td><i class="fa fa-envelope-o" aria-hidden="true"> Mail us : <b>help@millionsllp.com</b></i></td> <td><i class="fa fa-phone-square " aria-hidden="true"> Call us : <b >+91 7990563470</b></i></td> </tr>



                        <tr>
                          
                          <td colspan="2">  <code> <small> Powered by <abbr title="Tier I Solution Package">{{env("APP_V_NAME",'MS System For Cloud ')}}</abbr> & Managed by <abbr title="Million Solutions LLP">MSL </abbr> </code></td>
                        </tr>

                        <tr>
                          
                          <td colspan="2" > <i class="fa fa-copyright" aria-hidden="true"></i> {{date('Y')}}-{{date('Y')+1}},All rights reserved by<a href="http://www.millionsllp.com"> <strong>Million Solutions LLP</strong></a>.</td>
                        </tr>

                           
                          
                     
                      </table>
                         
                    </div>
</div>


</div>
</div>
</div>





@endsection
