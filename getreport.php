<?php 
    include_once ('include/autoload.php');
    include ('include/header.php');
    $attendance = new Attendance;
    $staff_id=$_SESSION['staff_id'];
    
        // $staff_id = $_GET['staff'];
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
    <!-- <?php   //echo $staff_id; ?> -->
            
    <form action="" method="post" class=""> 
        
        <div class="row form-group">
            
        <div class="col-6">
        <div class="col-6">
                <label for="text-input" class=" form-control-label">Start Date</label>
                </div>
            <input type="date" placeholder="pick-start-date" name="from_date" class="form-control">
        </div>
        
    <div class="col-6">
        <div class="col-6">
        <label for="text-input" class=" form-control-label">End Date</label>
    </div>
        <input type="date" placeholder="pick-end-date" name="to_date" class="form-control">
    </div> 
    </div>  
        <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="getreport"> <i class="fa fa-star"> </i>&nbsp; Get Report</button> 
    
    </form>
        
        
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
                <h3> <span class="badge badge-primary"> <?php  echo $view['firstname']?>,  <?php echo $view['lastname']?> </span>  : Attendance Report</h3>
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
                if(isset($_POST['getreport'])){
                    $date1 = $_POST['from_date'];
                    $from_date = date('Y-m-d', strtotime($date1));
                    $date2 = $_POST['to_date'];
                    $to_date = date('Y-m-d', strtotime($date1));
                   
                    if($from_date == ""){
                        $get_report_error_message = 'Pleased enter report start date';
                    }elseif($to_date == ""){
                        $get_report_error_message = 'Pleased enter report end date';
                    }elseif($staff_id == ""){
                        $get_report_error_message = 'No staff to view report. Thanks';
                    }else{
                        $getreport = $attendance->getStaffMoreReport($staff_id, $from_date, $to_date);
                        foreach($getreport as $view){
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
            <?php  
                }
             }       

         }
       ?>
            </table>
            </div>
    <!-- END DATA TABLE-->   
 <?php include ('include/footer.php') ?>