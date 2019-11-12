<?php
    include_once ('../include/autoload.php');
    include ('../include/header1.php');

    $resumption = new Settings ();
    if(isset($_POST['resumption'])){
        $resumption_time = $_POST['resumption_time'];
        $closing_time = $_POST['closing_time'];
        if($resumption_time ==""){
            $resumption_error_message='Pleased enter resumption time!';
        }elseif($closing_time == ""){
            $resumption_error_message= 'Pleased eneter closing time!';
        }else{
            $result = $resumption->setResumption($resumption_time, $closing_time);
            if($result){
                $resumption_success_message = 'Resumption and closing time save successful, Thanks';
            }
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
                                    <h2 class="title-1">Set Resumption Time</h2>
                                    
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
<!--My contant start-->
<h5><u>Change resumption time</u></h5><br>
        <?php 
            if(isset($resumption_error_message) and $resumption_error_message != ""){
                echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                .$resumption_error_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
            if(isset( $resumption_success_message) and  $resumption_success_message !="")
                echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success  <br></span>'
                . $resumption_success_message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        ?>
        
    <form action="" method="post" > 
                  
        <div class="row form-group">
            <br>
        <div class="col-6">
        <div class="col col-md-9">
                <label for="text-input" class=" form-control-label">Resumption Time</label>
             </div>
            <input type="time" placeholder="pick-start-date" name="resumption_time" class="form-control">
        </div>
    </div> 
    <div class="row form-group">
    <div class="col-6">
        <div class="col col-md-9">
        <label for="text-input" class=" form-control-label">Closing Time</label>
    </div>
        <input type="time" placeholder="pick-end-date" name="closing_time" class="form-control">
    </div>   
    </div>
        <div class="form-actions form-group"> 
    <i class="fa fa-star"></i>&nbsp; <input type="submit"  class="btn btn-primary" name="resumption" value="Save">   
    </div>
   </form>
    <br>
    <h4>Time in 24 hours format </h4>
    <br>
    <?php $resum = new Settings;
            $viewresum = $resum->getResumption();
            foreach ($viewresum as $view){
    ?>
     <fieldset disabled>
    <div class="row form-group">
            <br>
        <div class="col-6">
        <div class="col col-md-9">
                <label for="text-input" class=" form-control-label">Resumption Time</label>
             </div>
            <input type="text" value="<?php echo $view['resumption_time'] ?>" class="form-control">
        </div>
    </div> 
    <div class="row form-group">
    <div class="col-6">
        <div class="col col-md-9">
        <label for="text-input" class=" form-control-label">Closing Time</label>
    </div>
        <input type="text" value="<?php echo $view['closing_time'] ?>" class="form-control">
    </div>   
    </div> 
    </fieldset>
            <?php } ?>
</div> 
<?php include ('../include/footer1.php') ?>