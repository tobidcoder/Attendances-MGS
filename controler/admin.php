<?php

include_once ('../include/autoload.php');
  $admin = new Admin;

    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

            if($username == ""){
                $login_error_message = 'Username can not be empty';
            }else if($password == ""){
                $login_error_message = 'Password can not be empty';
            }else{
                $adminlogin = $admin->loginAdmin($username, $password);
                if($adminlogin > 0) {
                    session_start();
                    $_SESSION['id'] = $adminlogin->id;
                    $_SESSION['admin_username'] = $adminlogin->username;
                    $_SESSION['firstname'] = $adminlogin->firstname;
                    $_SESSION['lastname'] = $adminlogin->lastname;
                    $_SESSION['email'] = $adminlogin->email;
                    header("location: dashboard.php");
                }else{
                    $login_error_message = 'You enter invalid details or you are not our staff';
                }
            }    
    }
?>