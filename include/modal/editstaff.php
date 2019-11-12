<?php include_once ('../include/autoload.php'); ?>
<!-- modal medium -->
<div class="modal fade" id="editstaff" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"> Edit Staff details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="">
                <div class="modal-body">           
                        
                        <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                        </div>
                                    <input type="text" id="firstname" name="username" placeholder="First Name" class="form-control">
                                    </div>
                            </div> 
                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="lastname" name="lname" placeholder="Last Name" class="form-control">
                                    </div>
                                </div>
                            <!-- <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="staffemail" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm">Edit Staff</button>
                            </div>
                       
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" name="search">
                        <i class="fa fa-star"></i>&nbsp;Edit staff</button>   
                </div>                                                               
                </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- end modal medium -->