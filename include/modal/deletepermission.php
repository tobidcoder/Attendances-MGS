<?php include_once ('../include/autoload.php'); ?>
<!-- modal static -->
<div class="modal fade" id="deletepermission" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
        data-backdrop="static"> 
           <div class="modal-dialog modal-sm" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="deletehalfday">Delete Halfday</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <p>
                           Are you sure you what to delete this Permission, for this staff!
                       </p>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                       <button type="submit" name="deletepermission" class="btn btn-danger">Delete Permission</button>
                   </div>
               </div>
           </div>
        </div>
        <!-- end modal static -->