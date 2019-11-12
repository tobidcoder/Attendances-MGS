<?Php 
    include_once ('../include/autoload.php');
    include ('../include/header1.php');
    $id = isset($_GET['absent']);
    $id =($_GET['absent']);
    $permission = new Permission;
    // $start_date, $end_date, $comment, $id
    if(isset($_POST['updateabsent'])){
        $id =($_GET['absent']);
        $date1 = $_POST['start_date'];
        $start_date = date('Y-m-d', strtotime($date1));
        $date2 = $_POST['end_date'];
        $end_date = date('Y-m-d', strtotime($date2));
        $comment = trim($_POST['comment']);

        if($id ==""){
            $absent_error_meassage ='No absent permission sellected. Thanks';
        }elseif($start_date == ""){
            $absent_error_meassage ='Pleased enter absent start date. Thanks';
        }elseif($end_date == ""){
            $absent_error_meassage ='Pleased enter absent end date. Thanks';
        }elseif($comment== ""){
            $absent_error_meassage ='Pleased enter description for absent. Thanks';
        }else{
            $result = $permission->updatePermission($start_date, $end_date, $comment, $id);
                $absent_success_meassage ='Absent resumption created for staff successful. Thanks';
                // header("location: viewallpermission.php");
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
                                    
                                    <!-- <h3 class="title-1">Set absent with Permission for <span class="badge badge-primary"> <?php  //echo $view['firstname']?>,  <?php // echo $view['lastname']?> </span></h3>
                           <?php// } ?> -->
                                    </div>
                                </div>
                            </div>
            <div class="row m-t-25"></div>
    <!--My contant start--> 
    <?php 
            if(isset($absent_error_meassage ) and $absent_error_meassage  != ""){
            echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Danger  <br></span> '
            .$absent_error_meassage.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        if(isset($absent_success_meassage) and $absent_success_meassage !="")
            echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success  <br></span>'
            .$absent_success_meassage.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    ?>         

        <form action="" method="post" class=""> 
            <input type="text" id="staff_id" name="staff_id" value="<?php echo $staff_id ?>"class="form-control" hidden> 
            <input type="text" id="status" name="status" value="absent"class="form-control" hidden> 
            <input type="text" id="recurring_status" name="recurring_status" value="No"class="form-control" hidden> 
            <input type="text" id="recurring_day" name="recurring_day" value="Null"class="form-control" hidden> 
            
                <div class="row form-group">
                <div class=" col-md-3">
                    <label for="select" class=" form-control-label">Select date</label>
                </div>
                
                    <div class="col-6 col-md-3"> 
                    <div class="col-6 col-md-9">
                            <label for="text-input" class=" form-control-label">Start Date:</label>
                            </div>
                        <input type="date" placeholder="pick-start-date" name="start_date"class="form-control">
                    </div> 
                    <div class="col-6 col-md-3"> 
                    <div class="col-6 col-md-8">
                            <label for="text-input" class=" form-control-label">End Date:</label>
                            </div>
                        <input type="date" placeholder="pick-end-date" name="end_date"class="form-control">
                    </div>       
                </div>
                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="comment" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-6 col-md-6">
                        <textarea  id="comment" rows="5" placeholder="Comment..." name="comment" class="form-control"></textarea>
                    </div>
                </div>    
                
            </div>
        <div class="modal-footer">
         <a href="createabsent.php">   <button type="button" class="btn btn-secondary" data-dismiss="modal">Go back</button></a>
            <button type="submit" class="btn btn-primary" name="updateabsent">
                <i class="fa fa-star"></i>&nbsp;Grant Permission</button>   
        </div>
                                                                    
        </form>


        <?php include ('../include/footer1.php') ?>