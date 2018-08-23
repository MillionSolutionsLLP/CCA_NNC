	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed ms-btn-full-width-main text-left " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-archive" aria-hidden="true"></i> Company Master </span>

           <span class="pull-right ms-mod-btn btn btn-default ms-btn-full-width-side" ms-live-link="{{ action("\B\MAS\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editCompany") }}"><i class="fa fa-university" aria-hidden="true"></i> Manage Company Details</a>
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@viewTax") }}"><i class="fa fa-percent" aria-hidden="true"></i> Manage Tax Details</a>
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editHSNSAC") }}"><i class="fa fa-code" aria-hidden="true"></i> Manage HSN/SAC</a>
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@viewTNC") }}"><i class="fa fa-handshake-o" aria-hidden="true"></i> Manage Terms & Conditions</a>


      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\Users\Controller@view_all_users") }}"><i class="fa fa-users" aria-hidden="true"></i> Manage Users</a>



      
		
      </div>
    </div>
  </div>
  <!-- <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title " >
       <div class="btn-group" role="group" aria-label="...">
         <span class="btn btn-default collapsed ms-mod-btn" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" ms-live-link="{{ action("\B\MAS\Controller@viewCC") }}"><i class="fa fa-code-fork" aria-hidden="true"></i> Capita C. Master</span>

          <span class="pull-right ms-mod-btn  btn btn-default" ms-live-link="{{ action("\B\MAS\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span>
        </div>
      
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body list-group ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@viewCC") }}">
      	<a href="#" class="list-group-item">Manage CC Rate</a>
      </div>
    </div>
  </div> -->
<!--   <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title " >
      <div class="btn-group" role="group" aria-label="...">
          <span class="btn btn-default collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-flask" aria-hidden="true"></i> Treatment C. Master</span>

          <span class="pull-right ms-mod-btn  btn btn-default" ms-live-link="{{ action("\B\MAS\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span>
        </div>
      
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body list-group">
        <a href="#" class="list-group-item">Manage TC Usage Rate</a>
        <a href="#" class="list-group-item">Manage TC Fine Rate</a>
      </div>
    </div>
  </div> -->
</div>