<?php include_once ('../include/autoload.php');
    include ('../include/header1.php');
    $staff = new Staff();
    if (isset($_POST['register'])) {
        
    if ($_POST['firstname'] == "") {
        $register_error_message = 'First Name field is required!';
    }else if ($_POST['lastname'] == "") {
        $register_error_message = 'Last Name field is required!';
    }else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Username field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
        //Check if email exist
    } else if ($staff->checkEmailexit($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
        //check if username exit
    } else if ($staff->checkUsernameExit($_POST['username'])) {
        $register_error_message = 'Username is already in use!';
    } else {
        $staff_id = $staff->staffRegister($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'],  $_POST['password']);
        //ECHO SUCCESSFUL MEASSGE 
        $register_success_message = 'New staff created sucessfull';
    }
}
?>
         <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25"></div>
                        <!--My contant start-->
                            
                    <div class="col-lg-6">
                            <div class="card">
                                <div style="background-color: blue; color: white;" class="card-header">Enter Staff Details</div>
                                <div class="card-body card-block">
                                <?php 
                            if(isset($register_error_message) and $register_error_message != ""){
                                echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                                .$register_error_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            }
                            if(isset($register_success_message) and $register_success_message !="")
                                echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success  <br></span>'
                                .$register_success_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            ?>
                       
                                    <form action="" method="post">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                    </div>
                                                <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control">
                                                </div>
                                        </div> 
                                        <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="lname" name="lastname" placeholder="Last Name" class="form-control">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                        <input type="submit" class="btn btn-success" name="register" value="Create staff">
                                            <!-- <button type="submit" name="register" class="btn btn-success btn-sm">Create Staff</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<?php include ('../include/footer1.php') ?>