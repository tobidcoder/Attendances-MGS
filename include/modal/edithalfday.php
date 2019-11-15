<?php include_once ('../include/autoload.php'); ?>
<!-- modal medium -->
<div class="modal fade" id="edithalfday" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edithalfday"> Edit Halfday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">           
                <form action="" method="post" class="">   
                    
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value="">Every</option>
                            <option value="2">Monday</option>
                            <option value="3">Tuesday</option>
                            <option value="4">Wednessday</option>
                            <option value="5">Thursday</option>
                            <option value="6">Friday</option>
                            <option value="7" hidden>Saturday</option>
                        </select>
                    </div>
                    </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" name="search">
                        <i class="fa fa-star"></i>&nbsp;Set Half day</button>   
                </div>
                                                                            
                </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- end modal medium -->