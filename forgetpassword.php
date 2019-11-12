<?php 
    include_once('include/autoload.php');
    $staff = new Staff;
    if(isset($_POST['forgetpassword'])){
        $selector=bin2hex(random_bytes(8));
        $token=random_bytes(32));
        $url = "www.coralstone.com/forgotpassword/create-new-password.php?selector=".$selector. "&validator"=.bin2hex($token);
        $expire =date("U") + 1800;
        $email=$_POST['email'];
        //call deletepassemail methods

        //call resetpassord methods

        //Sending reset password reset
        $to =$email;
        $subject='Reset your password for your company';
        $message ='<p>We recieved a pssword reset request. The link to reset password. If you did not make this request, you can ignore this email</P>';
        $message.='<p> Here is your password reset link: </P>';
        $message.='<a href="'.$url.'">'.$url.'</a></P>';
        $headers = "FROM: YOUR COMAPANY NAME <tobiloba@gmail.com\r\n";
        $headers.="Reply-To: odetobi123@gmail.com\r\n";
        mail($to, $subject, $message, $headers);

        $reset_sucess_password = 'Checked your email ';


    }else{
        $reset_error_password ='This email did not register with us';
    }












    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if($username == ""){
            $login_error_message = 'Pleased enter your valid username';
        }elseif($password ==""){
            $login_error_message = 'Pleased eneter your valid password';
        }else{
            $stafflogin = $staff->loginStaff($username, $password);
            if($stafflogin > 0){
                session_start();
                $_SESSION['staff_id']= $stafflogin->staff_id;
                $_SESSION['firstname'] = $stafflogin->firstname;
                $_SESSION['lastname'] = $stafflogin->lastname;
                $_SESSION['email'] = $stafflogin->email;
                $_SESSION['username'] =$stafflogin->username;
                header("location: clockin.php");
            }else{
                $login_error_message = 'The details you enter is not correct!';
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
                        <?php
                        if(isset($login_error_message) and $login_error_message != ""){
                            echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                                .$login_error_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                        }

                        ?>
                        <h4>Reset your password </h4>
                        <p>An e-mail will be send to you with instructions on how to reste your password. </p>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label></label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Enter your e-mail address...">
                                </div>                              
                                <input type="submit" class="btn btn-success" name="forgetpassword" value="Reset password"> 
                            </form>
                            <div class="register-link">
                                
                            </div>
                        </div>
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