<?php
   include_once ('../include/autoload.php');
   include ('../include/header1.php');
    $staff_id = isset($_GET['staff']);
    $staff_id =($_GET['staff']);
    $permission = new Permission;
    // $staff_id, $status, $recurring_status, $start_date, $end_date, $recurring_day, $comment
    if(isset($_POST['halfday'])){
        $staff_id = trim($_POST['staff_id']);
        $status = trim($_POST['status']);
        $recurring_status = trim($_POST['recurring_status']);
        $date1 = $_POST['start_date'];
        $start_date = date('Y-m-d', strtotime($date1));
        $date2 = $_POST['end_date'];
        $end_date = date('Y-m-d', strtotime($date2));
        $recurring_day = trim($_POST['recurring_day']);
        $comment = trim($_POST['comment']);

        if($staff_id ==""){
            $halfday_error_meassage ='No staff sellected. Thanks';
        }elseif($status == ""){
            $halfday_error_meassage ='No status for this halfday';
        }elseif($recurring_status == ""){
            $halfday_error_meassage ='No recurring status for this halfday';
        }elseif($start_date == ""){
            $halfday_error_meassage ='Plesaed enter halfday start date. Thanks';
        }elseif($end_date == ""){
            $halfday_error_meassage ='Plesaed enter halfday end date. Thanks';
        }elseif($recurring_day == ""){
                $halfday_error_meassage ='Pleased select halfday recurring day. Thanks';
        }elseif($recurring_day == ""){
            $halfday_error_meassage ='Pleased select halfday recurring day. Thanks';
        }else{
            $result = $permission->setHalfday($staff_id, $status, $recurring_status, $start_date, $end_date, $recurring_day, $comment);
                $halfday_success_meassage ='Halfday resumption created for staff successful. Thanks';
                header("location: viewallhalfday.php");
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
                        <?php $staff = new Staff();
                           $viewstaff = $staff->getOneStaff($staff_id);
                           foreach ($viewstaff as $view){
                           
                           ?>
                                    <h3 class="title-1">Set half day Resumption for <span class="badge badge-primary"> <?php  echo $view['firstname']?>,  <?php echo $view['lastname']?> </span></h3>
                           <?php } ?>
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
 <!--My contant start--> 
 <?php 
        if(isset($halfday_error_meassage ) and $halfday_error_meassage  != ""){
            echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Danger  <br></span> '
            .$halfday_error_meassage .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        if(isset($halfday_success_meassage ) and $halfday_success_meassage  !="")
            echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success  <br></span>'
            .$halfday_success_meassage.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    ?>           
 <form action="" method="post">  

 <!-- // $staff_id, $status, $recurring_status, $start_date, $end_date, $recurring_day -->
            <input type="text" id="staff_id" name="staff_id" value="<?php echo $staff_id ?>"class="form-control" hidden> 
            <input type="text" id="status" name="status" value="halfday"class="form-control" hidden> 
            <input type="text" id="recurring_status" name="recurring_status" value="yes"class="form-control" hidden> 
            <input type="text" id="comment" name="comment" value="Null"class="form-control" hidden> 
          
            <div class="row form-group">
                <div class=" col-md-3">
                        <label for="select" class=" form-control-label">Set date</label>
                    </div>
                    
                    <div class="col-6 col-md-3"> 
                        <div class="col-6 col-md-9">
                                <label for="text-input" id="firstname" class=" form-control-label">Start Date:</label>
                                </div>
                            <input type="date" placeholder="pick-start-date" name="start_date" class="form-control">
                        </div> 
                        <div class="col-6 col-md-3"> 
                        <div class="col-6 col-md-8">
                                <label for="text-input" class=" form-control-label">End Date:</label>
                                </div>
                            <input type="date" placeholder="pick-end-date" name="end_date" class="form-control">
                        </div>       
                    </div>
                    <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Select Day:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select  id="recurring_day" name="recurring_day" class="form-control">
                             <option>Every</option>
                            <option >Monday</option>
                            <option >Tuesday</option>
                            <option>Wednessday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                        </select>
                    </div>
                 </div>
                    </div>
                <div class="modal-footer">
                  <a href="createhalfday.php"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button></a>
                    <button type="submit" class="btn btn-primary" name="halfday">
                        <i class="fa fa-star"></i>&nbsp;Set Half day</button>   
                </div>
                                                                           
                </form>
                <?php include ('../include/footer1.php') ?>