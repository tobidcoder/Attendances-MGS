<?php 
    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_username']);
    unset($_SESSION['admin_firstname']);
    unset($_SESSION['admin_lastname']);
    unset($_SESSION['admin_email'] );
    if(!isset($_SESSION["staff_id"])) {  
        header("location: login.php");
    }
   include_once ('include/autoload.php');
        $attendances = new Attendance;
        $permission = new Permission;
        // $settings = new Settings;
        // $resumptiontime =$settings->getResumption()
        // foreach ($resumptiontime as $resumtime){
        //     $openingtime = $resumtime['resumption_time'];
        //     echo $openingtime;
        // }
     $resum = new Settings;
    $viewresum = $resum->getResumption();
    foreach ($viewresum as $view){
        $resumptime = $view['resumption_time'];
       }
    
    if (isset($_POST['clockin'])) {
        $staff_id = $_SESSION['staff_id'];
        $date = date("Y-m-d");
        $clockin_date = date('Y-m-d', strtotime($date));
        $day =  date("l");
        $clock_in = date("H:i:s");
        $comment = $_POST['comment'];
        $clockin_status='Punctual';
        //check if staff have halfday
            if ($permission->checkIfstaffHaveDay()){
                if ($staff_id == "") {
                    $message_error_clockin = 'You are not alow to clocked in!';
                }else if ($date == "") {
                    $message_error_clockin= 'Today is not working date!';
                
                } else if ($day == "") {
                    $message_error_clockin = 'Today is not working day!';
                }  else {
                    //CLOCK IN Half day
                    $result = $attendances->clockinHalfDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment);
                    //ECHO SUCCESSFUL MEASSGE 
                    // if($result) {      
                        header("location: dashboard.php");
                    //  }
                }
                
            }else{

                if(strtotime($clock_in) <= strtotime($resumptime)){
                    $clockin_status= 'Punctual';  
                }else{
                    $clockin_status='Late';
                }

                if ($staff_id == "") {
                    $message_error_clockin = 'You are not alow to clocked in!';
                } else if ($date == "") {
                    $message_error_clockin= 'Today is not working date!';
                } else if ($day == "") {
                    $message_error_clockin = 'Today is not working day!';
                } else {
                    //Clock in full day
                    $result = $attendances->clockinFullDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment);
                    //ECHO SUCCESSFUL MEASSGE 
                    // if($result) {      
                        header("location: dashboard.php");
                    //  }
                }
            
            }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="include/css/font-face.css" rel="stylesheet" media="all">
    <link href="include/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="include/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="include/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="include/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="include/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="include/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="Coralstone Capital">
                            </a>
                        </div>
                        <div class="login-form">
                        <h5>Welcome to office, Pleased Clock In!</h5>
                        <br>
                        <?php 
                        if(isset($message_error_clockin) and $message_error_clockin != ""){
                                echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                                .$message_error_clockin.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            }
                        ?>
                        <form action="" method="post">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="comment" class=" form-control-label"></label>
                            </div>
                            <div class="col-6 col-md-6">
                                <textarea  id="comment" rows="5" placeholder="Comment..." name="comment" class="form-control"></textarea>
                            </div>
                            </div>    
                        
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="clockin"><h1 style="color: green;" ><i class="fa fa-clock"></i>&nbsp;Clock In</h1></button>
                        </form>
                            </div>
                            <br>
                            <a href="dashboard.php"> <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Already Clocked In : Go to dashboard</button><a>
                      </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="include/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="include/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="include/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="include/vendor/slick/slick.min.js">
    </script>
    <script src="include/vendor/wow/wow.min.js"></script>
    <script src="include/vendor/animsition/animsition.min.js"></script>
    <script src="include/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="include/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="include/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="include/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="include/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="include/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="include/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="include/js/main.js"></script>

</body>

</html>
<!-- end document-->