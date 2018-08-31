	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  







  <div class="panel panel-default">
      











    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#c1" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-print" aria-hidden="true"></i> Manage Agency</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ action ('\B\Panel\Controller@index_mod_data') }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>


    <div id="c1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
	     
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('AMS.Agency.Add') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add Agency</a>

      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('AMS.Agency.View') }}"> <i class="fa fa-eye" aria-hidden="true"></i> View All Agency</a>
  
    


      </div>
    </div>
  </div>


    <div class="panel panel-default">
      











    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#a1" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-print" aria-hidden="true"></i> Manage Task</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ action ('\B\Panel\Controller@index_mod_data') }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>


    <div id="a1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
       
       <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.Add') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Assign Task to Agency</a>

        <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.View') }}"> <i class="fa fa-eye" aria-hidden="true"></i> View All Task</a>

  


      </div>
    </div>
  </div>



  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#c2" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Master</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ action ('\B\Panel\Controller@index_mod_data') }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="c2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body list-group">
       
         
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editCompany") }}"><i class="fa fa-university" aria-hidden="true"></i> Manage Company Details</a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@viewTax") }}"><i class="fa fa-percent" aria-hidden="true"></i> Manage Tax Details</a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editHSNSAC") }}"><i class="fa fa-code" aria-hidden="true"></i> Manage HSN/SAC</a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@viewTNC") }}"><i class="fa fa-handshake-o" aria-hidden="true"></i> Manage Terms & Conditions</a>


      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\Users\Controller@view_all_users") }}"><i class="fa fa-users" aria-hidden="true"></i> Manage Users</a>





      </div>
    </div>
  </div>





</div>