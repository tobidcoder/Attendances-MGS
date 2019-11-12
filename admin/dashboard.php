
<?php 
    include_once ('../include/autoload.php');
    include ('../include/header1.php');
?>
   
           <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                            <?php $staffcount1 = new Attendance;
                                                $count1 = $staffcount1->getClockinTodayNumber();
                                            ?>
                                                <h2><?php echo $count1 ?></h2>
                                                <span>Present Today</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                    <?php $staffcount = new Staff;
                                        $count = $staffcount->getNumberofStaff();
                                    ?>
                                            <div class="text">
                                                <h2><?php echo $count ?></h2>
                                                <span>Total staff</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                    <?php $halfdaycount = new Permission;
                                        $count = $halfdaycount->getNumhalfDay();
                                    ?>
                                            <div class="text">
                                                <h2><?php echo $count ?></h2>
                                                <span>Total HalfDay</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                    <?php $absentcount = new Permission;
                                        $count = $absentcount->getNumAbsent();
                                    ?>
                                            <div class="text">
                                                <h2><?php echo $count ?></h2>
                                                <span>Total Absent</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                       
                        
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <h4>Clock in staff Today</h4>
        <br>
        <h3>
            <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group col-lg-4" data-table="staff-saerch"/>
        </h3>
        <table class="table table-borderless table-data3 staff-saerch">
        
            <thead style="background-color: #000080;">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Clock in Time</th>
                    <th>Clock Out Time</th>
                    <th>Clockin Status</th>
                </tr>
            </thead>
            <?php 
                $attentoday =new Attendance();
                $viewatten = $attentoday->getAllClockedinToday();
                foreach($viewatten  as $view){
                   
               
            ?>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo $view['clockin_date'] ?></td>
                    <td><?php echo $view['firstname'] ?></td>
                    <td><?php echo $view['lastname'] ?></td>
                    <td><?php echo $view['clock_in'] ?></td>
                    <td><?php echo $view['clock_out'] ?></td>
                    <td><?php echo $view['clockin_status'] ?></td>
                </tr>
                
              
            </tbody>
        <?php  } ?>
        </table>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
        </nav>
    </div>
    <!-- END DATA TABLE-->   
    
 <!--My Charts-->
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

<?php include ('../include/footer1.php') ?>