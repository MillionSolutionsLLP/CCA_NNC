

@extends('L.root_BackEnd')

@section('title')

{{env('APP_V_NAME',"MS-ERP 2.0.1") }} for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection

@section('content')


        <!-- Navigation -->
        @include('B.L.Object.Nav')

  
            <div class="ms-content ">
                <div class="">

                    <div class="ms-live-tab">
                     
                        @yield('Page-content')
                
                      

                    </div>

                </div>
             
            
            </div>
 
  @include('B.L.Object.User')



@endsection


@section('breadcrumb')
<li class=" ms-live-btn" ms-live-link='{{action("\B\MAS\Controller@indexData") }}'> {{B\MAS\Model::getCompanyName()}}: </li>
<li class=" ms-live-btn ms-breadcrumb-end" ms-live-link='{{action("\B\Panel\Controller@index_data") }}'><i class="fa fa-home" aria-hidden="true"></i></li>
@yield('Page-breadcrumb')
<dl class=" ms-live-btn pull-right" ms-live-link='{{action("\B\Panel\Controller@index") }}'> {{ Carbon::now()->format('l\\, jS \\of F\\, Y')}} </dl>
@endsection

@section('js')

@endsection