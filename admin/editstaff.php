<?php 
    include_once('../include/autoload.php');
    include ('../include/header1.php');
    $staff_id = isset($_GET['staff']);
    $staff_id =($_GET['staff']);
    $staff=new Staff;

    if (isset($_POST['updatestaff'])) {
        
        if ($_POST['firstname'] == "") {
            $update_error_message = 'First Name field is required!';
        }else if ($_POST['lastname'] == "") {
            $update_error_message = 'Last Name field is required!';
        } else if ($_POST['username'] == "") {
            $update_error_message = 'Username field is required!';
        } else if ($staff->checkUsernameExit($_POST['username'])) {
            $update_error_message = 'Username is already in use!';
        } else {
            $staffupdate= $staff->staffUpdateProfile($staff_id, $_POST['firstname'], $_POST['lastname'], $_POST['username']);
            //ECHO SUCCESSFUL MEASSGE 
            $update_success_message = 'Your details have updated succesful. Thanks';
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
                            <h2 class="title-1">View All Staff</h2>
                            
                        </div>
                    </div>
                </div>
    <div class="row m-t-25"></div>
      <!--My contant start-->
      <div class="col-lg-6">
                <div class="card">
                    <div style="background-color: blue; color: white;" class="card-header">Edit your Details</div>
                    <div class="card-body card-block">
                        <form action="" method="post" >
                        <?php 
                            $viewstaff = $staff->getOneStaff($staff_id);
                            foreach($viewstaff as $view){
                               $firstname= $view['firstname']; 
                               $lastname= $view['lastname'];
                               $username= $view['username'];
                               $email= $view['email'];
                            }

                           
                            if(isset($update_error_message) and $update_error_message != ""){
                                echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                                .$update_error_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            }
                            if(isset($update_success_message) and $update_success_message !="")
                                echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success  <br></span>'
                                .$update_success_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                       

                         ?>

                                <form action="" method="post" >
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                        </div>
                                    <input type="text" id="fname" name="firstname" value="<?php echo  $firstname ?>" class="form-control">
                                    </div>
                            </div> 
                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="lname" name="lastname" value="<?php echo  $lastname ?>" class="form-control">
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="username" value="<?php echo  $username ?>" class="form-control">
                                </div>
                            </div>
                            <fieldset disabled>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="<?php echo  $email ?>" class="form-control" disabled>
                                </div>
                            </div>
                            </fieldset>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm" name="updatestaff">Edit Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php include ('../include/footer1.php') ?>