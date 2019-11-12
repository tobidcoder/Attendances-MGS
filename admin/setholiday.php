<?php 
    include_once ('../include/autoload.php');
    include ('../include/header1.php');
//     $holiday= new Holidays();
//     if(isset($_POST['holiday'])){
//         $holiday_date = $_POST['holiday_date'];
//         $holiday_description = $_POST['holiday_description'];
//         if($holiday_date ==""){
//             $holiday_error_meassage ='Pleased select holiday date. Thanks';
//         }elseif($holiday_description == ""){
//             $holiday_error_meassage =' pleased enter holiday occation. Thanks';
//         }else{
//             $result = $holiday->setHolidays($holiday_date, $holiday_description);
//             if($result){
//             $holiday_success_meassage ='Great new holiday have been set successful';
//         }
//     }
// }
 

    $holiday = new Holidays;
    
    if(isset($_POST['holidays'])){

        $date = $_POST['holiday_date'];;
        $holiday_date = date('Y-m-d', strtotime($date));
        $holiday_description = trim( $_POST['holiday_description']);
        if($holiday_date ==""){
            $holiday_error_meassage ='Pleased enter resumption time';
        }elseif($holiday_description == ""){
            $holiday_error_meassage ='Pleased eneter closing time';
        }else{
            $result = $holiday->setHolidays($holiday_date, $holiday_description);
            if($result){
                $holiday_success_meassage ='Resumption and closing time save successful, Thanks';
                echo $date ;
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
                            <h2 class="title-1">Set Holiday</h2>
                            
                        </div>
                    </div>
                </div>
    <div class="row m-t-25"></div>
 <!--My contant start-->
        <?php 
            if(isset($holiday_error_meassage) and $holiday_error_meassage != ""){
                echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Danger  <br></span> '
                .$holiday_error_meassage.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
            if(isset($holiday_success_meassage) and $holiday_success_meassage !="")
                echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success  <br></span>'
                .$holiday_success_meassage.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        ?>             
    <form action="" method="POST">   
             <div class="row form-group">
               <div class="col-6">
                <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Date</label>
                    </div>
                <input type="date" name="holiday_date" class="form-control">
                </div>
            </div>
                <div class="row form-group">
                     <div class="col-6">
                     <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Occation</label>
                    </div>
                    <input type="text" name="holiday_description" placeholder="Independent day" class="form-control">
                    </div>
                </div>
               <input type="submit" class="btn btn-success" name="holidays" value="Set Holiday">
                    <!-- <i class="fa fa-star"></i>&nbsp;Set Holiday                                                            --> 
            
         </form>
         <br>
        <h5>This Month Holiday</h5>
         <!-- DATA TABLE-->
         <div class="table-responsive m-b-40">
        <h3>
            <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group col-lg-4" data-table="staff-saerch"/>
        </h3>
             <table class="table table-borderless table-data3 staff-saerch">
        <thead style="background-color: #000080;">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Ocation</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
            $holiday =new Holidays();
            $viewholiday = $holiday->getHolidays();
            foreach($viewholiday as $view){
        ?>
        <tbody>
        <tr>
            <td><?php echo $view['id'] ?></td>
            <td><?php echo $view['holiday_date'] ?></td>
            <td><?php echo $view['holiday_description'] ?></td>
            <td><button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#editholiday">Edit</button>
                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#deleteholiday">Delete</button>
          </tr>
                
            </tbody>
            <?php } ?>
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

        <?php include ('../include/footer1.php') ?>
<!-- modal medium -->
<div class="modal fade" id="editholiday" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editholiday"> Edit Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">           
                        <form action="" method="post" class="">
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-database"></i>
                                        </div>
                                    <input type="date" id="date" name="date" placeholder="" class="form-control">
                                    </div>
                            </div> 
                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-address-card"></i>
                                        </div>
                                        <input type="text" id="description" name="description" placeholder="Independent day" class="form-control">
                                    </div>
                                </div>
                        </form>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Edit Holiday</button>
                </div>                                                               
                </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- end modal medium -->
<!-- modal static -->
<div class="modal fade" id="deleteholiday" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">
   <div class="modal-dialog modal-sm" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="deletestaff">Delete Holiday</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <p>
                   Are you sure you what to delete this Holiday!
               </p>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-danger">Delete Holiday</button>
           </div>
       </div>
   </div>
</div>
<!-- end modal static -->
                