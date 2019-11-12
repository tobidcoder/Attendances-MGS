<?php include ('include/header.php') ?>
            <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Change password</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="row m-t-25"></div>
                <!--My contant start-->
                    
                <div class="col-lg-6">
                        <div class="card">
                            <div style="background-color: blue; color: white;" class="card-header">Change your password</div>
                            <div class="card-body card-block">
                                <form action="" method="post" class=""> 
                                  
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>
                                            <input type="password" id="password" name="password" placeholder="Enter Current Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class=" col-md-3"> 
                                                </div>
                                            <label class="form-control-label">Enter new password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="passwordnew" name="passwordnew" placeholder="Enter new password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="password" id="passwordnewcon" name="passwordnewcon" placeholder="Confirm new Password" class="form-control">
                                                </div>
                                            </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Create new password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    

 <?php include ('include/footer.php') ?>
