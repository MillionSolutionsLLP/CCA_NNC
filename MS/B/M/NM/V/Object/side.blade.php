	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  



  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width"" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-cogs" aria-hidden="true"></i> Manage News</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ route('NM.indexData')}}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('NM.addNews')}}" ms-shortcut="a+n"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add News<strong class="label label-default pull-right">A + N</strong></a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link=""  ms-shortcut="e+n"> <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit News</a>

      </div>
    </div>
  </div>






  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width"" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-eye" aria-hidden="true"></i> View News</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ route('NM.indexData')}}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('NM.viewNews')}}" ms-shortcut="v+n"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> View All News <strong class="label label-default pull-right">V + N</strong></a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link=""> <i class="fa fa-angle-double-right" aria-hidden="true"></i> View by Month</a>

      </div>
    </div>
  </div>






</div>