<?php include_once ('../include/autoload.php'); ?>
 <!-- modal medium -->
 <div class="modal fade" id="editpermission" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editpermission"> Edit Permission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">           
                        <form action="" method="post" class="">   
                        <div class="row form-group">
                            <div class=" col-md-3">
                                    <label for="select" class=" form-control-label">Select date</label>
                                </div>
                                
                                    <div class="col-6 col-md-3"> 
                                    <div class="col-6 col-md-9">
                                            <label for="text-input" class=" form-control-label">Start Date:</label>
                                            </div>
                                        <input type="date" placeholder="pick-start-date" class="form-control">
                                    </div> 
                                    <div class="col-6 col-md-3"> 
                                    <div class="col-6 col-md-8">
                                            <label for="text-input" class=" form-control-label">End Date:</label>
                                            </div>
                                        <input type="date" placeholder="pick-end-date" class="form-control">
                                    </div>       
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <textarea name="description" id="description" rows="5" placeholder="Content..." class="form-control"></textarea>
                                    </div>
                                </div>  
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="search">
                                <i class="fa fa-star"></i>&nbsp;Grant Permission</button>   
                        </div>
                                                                                   
                        </form>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
            <!-- modal medium -->
       