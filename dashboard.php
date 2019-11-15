<?php
    include_once ('include/autoload.php');
    include ('include/header.php');
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
    $clock_in = date("H:i:s:a");
    $comment = $_POST['comment'];
    $clockin_status='Punctual';
    //check if staff have halfday
        if ($permission->checkIfstaffHaveDay()){
            if ($staff_id == "") {
                $message_clock_error = 'You are not alow to clocked in!';
            }else if ($date == "") {
                $message_clock_error= 'Today is not working date!';
            
            } else if ($day == "") {
                $message_clock_error = 'Today is not working day!';
            }  else {
                //CLOCK IN Half day
                $result = $attendances->clockinHalfDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment);
                $_SESSION['clockin'] = $clock_in;
                //ECHO SUCCESSFUL MEASSGE 
                $message_clock_success = ' you have successful clock in. Thanks';
                // if($result) {      
                    // header("location: dashboard.php");
                //  }
            }
            
        }else{
            $clock_in = date("H:i:s:a"); 
            if($clock_in >= $resumptime){
                $clockin_status= 'Late';  
            }else{
                $clockin_status= 'Punctual';
                }
           
           
            $clock_in = date("H:i:s:a"); 
            if ($staff_id == "") {
                $message_clock_error = 'You are not alow to clocked in!';
            } else if ($date == "") {
                $message_clock_error = 'Today is not working date!';
            } else if ($day == "") {
                $message_clock_error = 'Today is not working day!';
            } else {
                //Clock in full day
                $result = $attendances->clockinFullDay($staff_id, $clockin_date, $day, $clock_in, $clockin_status, $comment);
                //ECHO SUCCESSFUL MEASSGE
                // $_SESSION['clockin'] = $clock_in; 
                // if($result) {      
                    // header("location: dashboard.php");
                //  }
            }
        
        }
}

  //Clock out script
    if(isset($_POST['clockout'])){
        $clock_out = date("H:i:s");
        
        $result = $attendances->clockOut($clock_out);
        if($result) {   
            $message_clock_success = 'You have succesful clock out. Thanks'; 
            unset($_SESSION['clockin']);
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
             
                <h2  class="text-center title-2">You Resume at: <span class="badge badge-primary"><?php echo $clockin['clock_in']; ?></span></h2>
                <?php  }        ?>
            </div>
            <hr>
            <?php 
                if(isset($message_clock_success) and $message_clock_success != ""){
                        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">success  <br></span> '
                        .$message_clock_success.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    }
                     
                    if(isset($$message_clock_error) and $$message_clock_error != ""){
                        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">danger  <br></span> '
                        .$$message_clock_error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>';
                    }
                    
                    // $clockedme = $attendances->clokinButton();
                    //     foreach ($clockedme as $clock){
                    //         $clock_out = $clock['clock_out'];
                    //         // $clock_in = $clock['id'];
                    //         // echo $clock_in;
                    //         echo $clock_out;
                    //         echo $clock_out;
                    //         echo $clock_out;
                    //     }
                    //     echo $clock_out;
                if( $attendances->clokinButton()){
                     //<!-- Clock Out form  -->
                        echo '<form action="" method="post">  
                        <button type="submit" class="btn btn-danger btn-block" name="clockout">
                            <h1 style="color: white; align-content: center;"><i class="fa fa-clock"></i>&nbsp;Clock Out</h1> </button>
                        </form>';
               }else{
                    //Clock in Form
                    echo '<form action="" method="post">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="comment" class=" form-control-label"></label>
                        </div>
                        <div class="col-6 col-md-6">
                            <textarea  id="comment" rows="3" placeholder="Comment..." name="comment" class="form-control"></textarea>
                        </div>
                        </div>    
                    
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="clockin"><h1 style="color: green;" ><i class="fa fa-clock"></i>&nbsp;Clock In</h1></button>
                    
                    </form>';

                }
            
            ?>
            
           <br>
        </div>
        </div>
    <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="statistic__item statistic__item--blue">
                        <?php 
                            $count3 = $attendances->getPunctualNumofstaff();
                        ?>
                        <h2 class="number"><?php echo $count3 ?> Days</h2>
                        <h3>Punctual</h3>
                       
                        <span class="desc">This Month</span>
                        
                    </div>
                </div>
                
                
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--orange">
                         <?php 
                            $count4 = $attendances->getLateNumofstaff();
                        ?>
                        <h2 class="number"><?php echo $count4 ?> Days</h2>
                        <h3>Late</h3>
                        
                        <span class="desc">This Month</span>
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--green">
                    <?php $permission = new Permission;
                        $count2=$permission->getNumberofhalfDay();
                    ?>
                    <h2 class="number"><?php echo $count2 ?> Day</h2>
                    <h5>Permission to Resume Late</h5>
                       
                        <span class="desc">For this month</span>
                        
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--red">
                         <?php $permission = new Permission;
                            $count1 = $permission->getNumberofAbsent();
                        ?>
                        <h2 class="number"><?php echo $count1 ?> Day</h2>
                        <h4>Absent with Permission.</h4>
                       
                        <span class="desc">For this month</span>
                        
                    </div>
                </div>
    
        
        </div>
    </div>
</section>

        </div>
        
    <?php include ('include/footer.php') ?>