<?php
session_start(); 

unset($_SESSION['staff_id']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['email']);
unset($_SESSION['username']);
if(!isset($_SESSION["admin_id"])) {  
  header("location: login.php");
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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../include/css/font-face.css" rel="stylesheet" media="all">
    <link href="../include/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../include/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../include/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../include/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../include/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../include/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!-- Main CSS-->
    <link href="../include/css/theme.css" rel="stylesheet" media="all">

    <!--Script to display current time and date-->
    <script type="text/javascript"> 
            function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
            h + ":" + m ;
            var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
            if (i < 10) {i = "0" + i};  
            return i;
            }
    // Script to edit clockin status
//     <script>
//    $(document).ready(function(){
//        $('.editbtn').on('click', function(){
//            $('#editstatus').modal('show');
//            $tr = $(this).closest('tr');
//            var data = $tr.children("td").map(function(){
//                return  $(this).text();
//            }).get()
//            console.log(data);
//            $('#updateid').val(data[0]);
//            $('#projectname').val(data[1]);
//            $('#projectdes').val(data[2]);
//            $('#projectduedate').val(data[4]);
//            $('#projectstatus').val(data[5]);
//        });
//    });
// </script>
        </script>
        
    <script type="text/javascript">
        function delete_data(staff_id){
            if(confirm('Are you sure you what to delete this staff?')){
            window.location.href='viewallstaff.php?delete_staff='+staff_id;
            }
        }
 
        function delete_absent($id){
            if(confirm('Are you sure you what to delete this absent with permission?')){
            window.location.href='viewallpermission.php?absent='+$id;
            }
        }
        function delete_halfday($id){
            if(confirm('Are you sure you what to delete this halfday permission?')){
            window.location.href='viewallhalfday.php?halfday='+$id;
            }
        }

        function delete_haliday($id){
            if(confirm('Are you sure you what to delete this Holiday?')){
            window.location.href='setholiday.php?holiday='+$id;
            }
        }
    </script>    
</head>

<body class="animsition" onload="startTime()">
        
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="dashboard.php">
                            <img src="../include/images/icon/logo-blue.png" alt="Attendances MGS" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                  <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-user"></i>Staff</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="createstaff.php">Create staff</a>
                            </li>
                            <li>
                                <a href="viewallstaff.php">View all staff</a>
                            </li>
                      </ul>
                      </li>
                      <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-chart-bar"></i>Attendance</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="report.php">Report</a>
                            </li>
                            <li>
                             <a href="viewallpermission.php">view Permission</a>
                            </li>
                            <li>
                                <a href="viewallhalfday.php">View Halfday</a>
                            </li>
                         </ul>
                    </li> 
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-user"></i>Profile</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="editprofile.php">Edit Profile</a>
                            </li>
                            <li>
                                <a href="changepassword.php">Change password</a>
                            </li>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
                         </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-chart-bar"></i>Attendance</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="createabsent.php">Absent with Permission</a>
                            </li>
                            <li>
                                <a href="createhalfday.php">Set half day</a>
                            </li>
                            <li>
                                    <a href="resumption.php">Set Resumption</a>
                                </li>
                            </ul>
                        </li>      
                </ul>
            </div>
         </nav>
    </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="dashboard.php">
                    <img src="../include/images/icon/logo-blue.png" alt="Atten Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Staff</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="createstaff.php">Create Staff</a>
                                    </li>
                                    <li>
                                        <a href="viewallstaff.php">View All Staff</a>
                                    </li>
                                 </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-chart-bar"></i>Attendance</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                        <a href="report.php">Report</a>
                                    </li>
                                    <li>
                                        <a href="viewallpermission.php">view Permission</a>
                                    </li>
                                    <li>
                                        <a href="viewallhalfday.php">View Halfday</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Profile</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="editprofile.php">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="changepassword.php">Change password</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Logout</a>
                                    </li>
                                 </ul>
                            </li> 
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-chart-bar"></i>Settings</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="createabsent.php">Absent with Permission</a>
                                    </li>
                                    <li>
                                        <a href="createhalfday.php">Set half day</a>
                                    </li>
                                    <li>
                                        <a href="setholiday.php">Set Holiday</a>
                                    </li>
                                    <li>
                                            <a href="resumption.php">Set Resumption</a>
                                        </li>  
                                </ul>
                            </li> 
                        </ul>                    
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                               
                                <!--Display Date and Time-->                         
                                <!-- <h>Today: <span id='date' ></span>    </h6>  -->
                                <?php $today = date("D, M j, Y");
                                $format = date("a");
                                ?>

                             <h3>
                                <span class="badge badge-secondary"><?php echo $today ?> <br><span id="txt" ></span> <?php echo $format ?> </span>
                            </h3>
                                    <div class="account-item account-item--style3 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../include/images/icon/avatar-01.jpg" alt="Staff" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $_SESSION['admin_username']?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../include/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="editprofile.php"><?php echo $_SESSION['admin_firstname'],   $_SESSION['admin_lastname']; ?></a>
                                            </h5>
                                            <span class="email"><?php echo $_SESSION['admin_email']; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="editprofile.php">
                                                <i class="zmdi zmdi-account"></i>Edit Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="changepassword.php">
                                                <i class="zmdi zmdi-settings"></i>Change Password</a>
                                        </div>
                                        
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            <!-- </div>
                        </div> -->
                    <!-- </div>
                </div>
            </div> -->
        

            
                           </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- <div id="loader"></div>
                <div style="display:none;" id="myDiv" class="animate-bottom"> -->