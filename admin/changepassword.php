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

    <!-- Main CSS-->
    <link href="../include/css/theme.css" rel="stylesheet" media="all">

    <!--Script to display current time and date-->
    <script type="text/javascript"> 
            function display_c(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_date()',refresh)
            }      
            // function display_date(){
            //     var x = new Date()
            //     var x1=x.toUTCString();
            //     document.getElementById('date').innerHTML = x1;
            //     tt=display_c();
            // }
            function display_date() {
            var x = new Date()
            var x1=x.getMonth() + 1+ "-" + x.getDate() + "-" + x.getFullYear(); 
            x1 = x1 + " | " +  x.getHours( )+ ":" +  x.getMinutes();
            document.getElementById('date').innerHTML = x1;
            display_c();
            }
        </script>
</head>

<body class="animsition"  onload=display_date();>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="../include/images/icon/logo12.png" alt="Attendances MGS" />
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
                            <a class="js-arrow" href="dashboard.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                  <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-user"></i>Staff</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="createstaff.html">Create staff</a>
                            </li>
                            <li>
                                <a href="viewallstaff.html">View all staff</a>
                            </li>
                      </ul>
                      </li>
                      <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-chart-bar"></i>Attendance</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="report.html">Report</a>
                            </li>
                            <li>
                             <a href="viewallpermission.html">view Permission</a>
                            </li>
                            <li>
                                <a href="viewallhalfday.html">View Halfday</a>
                            </li>
                         </ul>
                    </li> 
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-user"></i>Profile</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="editprofile.html">Edit Profile</a>
                            </li>
                            <li>
                                <a href="changepassword.html">Change password</a>
                            </li>
                            <li>
                                <a href="logout.html">Logout</a>
                            </li>
                         </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-chart-bar"></i>Attendance</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="absentwithpermission.html">Absent with Permission</a>
                            </li>
                            <li>
                                <a href="sethalfday.html">Set half day</a>
                            </li>
                            <li>
                                    <a href="resumption.html">Set Resumption</a>
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
                <a href="#">
                    <img src="images/icon/logo.png" alt="Atten Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dashboard.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Staff</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="createstaff.html">Create Staff</a>
                                    </li>
                                    <li>
                                        <a href="viewallstaff.html">View All Staff</a>
                                    </li>
                                 </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-chart-bar"></i>Attendance</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                        <a href="report.html">Report</a>
                                    </li>
                                    <li>
                                        <a href="viewallpermission.html">view Permission</a>
                                    </li>
                                    <li>
                                        <a href="viewallhalfday.html">View Halfday</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Profile</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="editprofile.html">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="changepassword.html">Change password</a>
                                    </li>
                                    <li>
                                        <a href="logout.html">Logout</a>
                                    </li>
                                 </ul>
                            </li> 
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-chart-bar"></i>Settings</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="absentwithpermission.html">Absent with Permission</a>
                                    </li>
                                    <li>
                                        <a href="sethalfday.html">Set half day</a>
                                    </li>
                                    <li>
                                        <a href="setholiday.html">Set Holiday</a>
                                    </li>
                                    <li>
                                            <a href="resumption.html">Set Resumption</a>
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
                                    <h2>Today:
                                        <span class="badge badge-primary"><span id='date' ></span>  </span>
                                    </h2>
                               
                                <h2>Welcome:
                                    <span class="badge badge-primary">Admin 1</span>
                                </h2>
                           </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->
    <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Change password</h2>
                                <button class="au-btn au-btn-icon au-btn--blue">
                              <i class="zmdi zmdi-plus"></i>Create staff</button>   
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
                        </div>
                                          
  

    
    <!--My footer start-->
</div>                   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Attendance MGS. All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../include/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../include/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../include/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../include/vendor/slick/slick.min.js">
    </script>
    <script src="../include/vendor/wow/wow.min.js"></script>
    <script src="../include/vendor/animsition/animsition.min.js"></script>
    <script src="../include/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../include/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../include/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../include/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../include/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../include/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../include/js/main.js"></script>

</body>

</html>
<!-- end document-->
