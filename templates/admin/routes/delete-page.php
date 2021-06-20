
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./dashboard/pages/"> <i class="fa fa-plus"></i>  Manage Pages</a>  
            </div>
         </div>
         <div class="panel-body">
            <form action="/ajax/delete-page" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="pageid" value="<?= $pid ?>" />
            	<input type="hidden" name="shortname" value="<?= $shortname ?>" />
                <div class="row">
                    <div class="col-md-12 form-group text-center">
                    	<p><em>Are you sure you want to delete this page?</em></p>
                        <label for="title"><h1><?= $pageinfo->title ?></h1></label>
                    </div>
                </div>
                    
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 form-group">
                        <button type="submit" class="form-control btn btn-danger" style="margin-top:10px;">Yes, Delete Page</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
         	</form>             
         </div>
      </div>
   </div>
</div>

