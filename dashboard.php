<?php
    include_once ('include/autoload.php');
    include ('include/header.php');
    $attendances = new Attendance;
    
  
    if(isset($_POST['clockout'])){
        $clock_out = date("H:i:s");
        
        $result = $attendances->clockOut($clock_out);
        if($result) {   
            $message_error_clockOut = 'You have succesful clock out. <a href="logout.php">  Click Here to Logout </a>';  
            // header("location: logout.php");
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
                                <h2 class="title-1">Dashboard</h2>
                                <!-- <button type="button" class="btn btn-info m-l-10 m-b-10">Working Days:
                                        <span class="badge badge-light">22</span> </button>
                                <button type="button" class="btn btn-success m-l-10 m-b-10">Punctual
                                    <span class="badge badge-light">9</span>
                                    </button>
                                <button type="button" class="btn btn-warning m-l-10 m-b-10">Late
                                    <span class="badge badge-light">5</span>
                                    </button>
                                <button type="button" class="btn btn-primary m-l-10 m-b-10">Absent with Pem.
                                    <span class="badge badge-light">2</span>
                                    </button>
                                <button type="button" class="btn btn-danger m-l-10 m-b-10">Absent
                                    <span class="badge badge-light">3</span>
                                    </button> -->
                                </div>
                        </div>
                    </div>
        <div class="row m-t-25"></div>
    <!--My contant start-->
    <br>
    <div class="card col-md-12">
        <div class="card-body">
            <div  class="card-title">
            <?php 
                $attendances = new Attendance;
                $getclockin = $attendances->getClockinTime();
                foreach($getclockin as $clockin){
                   
              ?>
             
                <h2  class="text-center title-2">Your Clock-in time is: <span class="badge badge-primary"><?php echo $clockin['clock_in']; ?></span></h2>
                <?php  }        ?>
            </div>
            <hr>
            <?php 
                if(isset($message_error_clockOut) and $message_error_clockOut != ""){
                        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">success  <br></span> '
                        .$message_error_clockOut.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    }
                ?>
            <form action="" method="post">
                
            <button type="submit" class="btn btn-danger btn-block" name="clockout">
                <h1 style="color: white; align-content: center;"><i class="fa fa-clock"></i>&nbsp;Clock Out</h1> </button>
            </form>
        </div>
        </div>
    <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="statistic__item statistic__item--blue">
                        <h3>Punctual</h3>
                        <h2 class="number">0 Days</h2>
                        <span class="desc">Out of 22 days</span>
                        
                    </div>
                </div>
                
                
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--orange">
                        <h3>Late</h3>
                        <h2 class="number">0 Days</h2>
                        <span class="desc">Out of 22 days</span>
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--green">
                        <h3>HalfDay</h3>
                        <?php $permission = new Permission;
                            $count2=$permission->getNumberofhalfDay();
                        ?>
                        <h2 class="number"><?php echo $count2 ?> days</h2>
                        <span class="desc">Out of 22 days</span>
                        
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--red">
                        <h4>Absent with Permission.</h4>
                        <?php $permission = new Permission;
                            $count1 = $permission->getNumberofAbsent();
                        ?>
                        <h2 class="number"><?php echo $count1 ?> Days</h2>
                        <span class="desc">Out of 22 days</span>
                        
                    </div>
                </div>
    
        
        </div>
    </div>
</section>
<!-- END STATISTIC-->

    <!-- <div class="col-lg-6">
        <div class="card">
             <div class="card-body">
                <div style="background-color: blue;" class="card-title">
                    <h2 style=" color: white;" class="text-center title-2">Welcome to office: Please</h2>
                </div>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                      
                        <input id="clock_in" name="clock_in" type="text" class="form-control"  value="present" hidden>
                    </div>
                    <div class="form-group">
                      
                     <input id="clock_out" name="clock_out" type="text" class="form-control"  value="yes" hidden>
                   </div>
                   <div class="form-group">
                      
                        <input id="work_status" name="work_status" type="text" class="form-control"  value="full_day" hidden>
                    </div>    
                    <div class="form-group">
                      
                      <input id="staff_id" name="staff_id" type="text" class="form-control"  value="1" hidden>
                 </div>
                 <button type="button" class="btn btn-primary" name="clockin">
                        <h1 style="color: white; align-content: center;"><i class="fa fa-clock"></i>&nbsp;Clock IN</h1> </button>
                </form>
            </div>
        </div>
     </div>              -->
     <!-- <div class="col-lg-6">
            <div class="card">
                 <div class="card-body">
                    <div style="background-color: blue;" class="card-title">
                        <h2 style=" color: white;" class="text-center title-2">Weldone: Please</h2>
                    </div>
                    <hr>
                    <form action="" method="post">
                        <div class="form-group">
                          
                            <input id="clock_in" name="clock_in" type="text" class="form-control"  value="present" hidden>
                        </div>
                        <div class="form-group">
                          
                         <input id="clock_out" name="clock_out" type="text" class="form-control"  value="yes" hidden>
                       </div>
                       <div class="form-group">
                          
                            <input id="work_status" name="work_status" type="text" class="form-control"  value="full_day" hidden>
                        </div>    
                        <div class="form-group">
                          
                          <input id="staff_id" name="staff_id" type="text" class="form-control"  value="1" hidden>
                     </div>
                     <button type="button" class="btn btn-primary" name="clockin">
                            <h1 style="color: white; align-content: center;"><i class="fa fa-clock"></i>&nbsp;Clock Out</h1> </button>
                    </form>
                </div>
            </div>
         </div>                                                             -->
    
        </div>
        
    <?php include ('include/footer.php') ?>