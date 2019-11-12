<?php 
        include_once ('include/autoload.php');
        include ('include/header.php');
        $staff_id= $_SESSION['staff_id'];
  
?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Your Attendance Report</h2>
                                    
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
      <!--My contant start-->

            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                    <br>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <?php $staff = new Staff();
                        $viewstaff = $staff->getOneStaff($staff_id);
                        foreach ($viewstaff as $view){
                     ?> 
                        <h3><span class="badge badge-primary"> <?php  echo $view['firstname']?>,  <?php echo $view['lastname']?> </span> :This week Attendance Report</h3>
                        <?php } ?>
                    <br>
                    <table class="table table-borderless table-data3">
                        <thead style="background-color: #000080;">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Clock in Time</th>
                                <th>Clock Out Time</th>
                                <th>Comment</th>
                                <th>Clocked in Status</th>
                                
                            </tr>
                        </thead>
                        <?php 
                            $attendance = new Attendance;
                            $attenweek=$attendance->getStaffthisWeekReport($staff_id);
                            foreach($attenweek as $view){
                            
                        ?>
                            
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $view['clockin_date']; ?></td>
                                <td><?php echo $view['clock_in']; ?></td>
                                <td><?php echo $view['clock_out']; ?></td>
                                <td><?php echo $view['comment']; ?></td>
                                <td><?php echo $view['clockin_status']; ?></td>
                                
                            </tr>
                           
                            
                        </tbody>
                        <?php   } ?>
                    </table>
                </div>
        <!-- END DATA TABLE-->   
 <?php include ('include/footer.php') ?>