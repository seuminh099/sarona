
<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
?>

      <table>
            
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                      

                  <div class="modal-body">

                    <form method="post" action="" enctype="multipart/form-data">

                    <tr>	
                      <div class="form-group">
                       
                        <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Category ID</label>
                        <td><input type="text" name="txtcateid"  class="form-control" readonly   /></td>

                      </div>
                    </tr>
                    <tr>
                      <div class="form-group">
                    
                        <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Category Name</label>
                       <td> <input type="text" name="txtcatname" placeholder="Category Name" class="form-control" > </td>
                        
                      </div>
                    </tr>
                    <tr>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Description</label>
                        <input type="text" name="txtdesc" placeholder="Description" class="form-control" >
                      </div>
                  </tr>
                      <tr>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label font-weight-bold text-dark">Photo</label>
                             <img src="images/noimage.jpg" onclick="triggerClick()" id="displaynew">
                             <label for="new" class="btn-primary lbl">Image</label>
                             <input type="file" name="txtphoto" onchange="displayimg(this)" id="new" style="display: none;">
                        
                      </div>
                    </tr>   
                       
                       <div class="modal-footer">
	                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                     <button type="reset" class="btn btn-info" >Reset</button>
	                     <input type="submit" class="btn btn-primary" name="btn_update" value="Update">

	                  </div>
	                  	</form>
                  </div>
                
                 <!-- end body -->

                </div>
              </div>
            </div>
             
          </table>
            
            <!-- End Update Form -->
</
 

</body>

</html>