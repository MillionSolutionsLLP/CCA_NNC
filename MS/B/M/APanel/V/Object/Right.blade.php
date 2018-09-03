            <ul class="nav navbar-nav pull-right">
 


   <li class="visible-md visible-lg" role="presentation"><div class="loading ">
   	
   	<img src="{{asset('/images/loading.gif')}}" width="40px" height="40px"> 
   </div> </li>

	 <?php 

	 $user=session('user')['userData'];

	//dd(session()->all());



	 ?>

  <li class="bg-info ms-border" role="presentation" data-toggle="modal" data-target="#profileModal" > <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{$user['name']}} </a>



  </li>

  @if(session()->has('user.adminData'))
    
  <li class="bg-danger ms-border" role="presentation"><a href="{{route('AMS.Agency.BackAsAdmin')}}" ms-live-link="{{route('AMS.Agency.BackAsAdmin')}}" ms-shortcut="q"><i class="fa fa-sign-out" aria-hidden="true"></i> Back to Admin Panel</a></li>   

  @else
  <li class="bg-danger ms-border" role="presentation"><a href="{{route('APanel.Logout')}}" ms-live-link="{{route('APanel.Logout')}}" ms-shortcut="q"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a></li>
  @endif
</ul>