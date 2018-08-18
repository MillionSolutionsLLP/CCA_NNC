

@extends('L.root_BackEnd')

@section('title')

{{env('APP_V_NAME',"MS-ERP 2.0.1") }} for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection

@section('content')


        <!-- Navigation -->
        @include('APanel.V.Object.Nav')

  
            <div class="ms-content">
                <div class="">

                    <div class="ms-live-tab">
                     
                        @yield('Page-content')
                
                      

                    </div>

                </div>
             
            
            </div>
 
  @include('B.L.Object.User')



@endsection


@section('breadcrumb')
<li class=" ms-live-link" ms-live-link='{{action("\B\Panel\Controller@index") }}'> {{B\MAS\Model::getCompanyName()}}: </li>
<li class=" ms-live-link" ms-live-link='{{action("\B\Panel\Controller@index") }}'>Home</li>
@yield('Page-breadcrumb')
<dl class=" ms-live-link pull-right" ms-live-link='{{action("\B\Panel\Controller@index") }}'>{{ Carbon::now()->format('l\\, jS \\of F\\, Y')}} <span id="clock">{{ Carbon::now()->format('h:i:s A')}}</span></dl>
@endsection

@section('js')

@endsection