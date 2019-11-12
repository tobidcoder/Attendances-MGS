<?php
     include_once ('../include/autoload.php');
     include ('../include/header1.php');
     // $staff_id = isset($_GET['staff']);
     // $staff_id =($_GET['staff']);
     $permission=new Permission();
     if(isset($_GET['halfday'])){
         $id =($_GET['halfday']);
         $deletehalfday=$permission->deleteHalfday($id);
         $halfday_delete_succesful = 'halfday permission deleted successful. Thanks';
        
        //  header("location: viewallhalfday.php");
        }
?>
  <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">View all Halfday for staff</h2>
                                
                            </div>
                        </div>
                    </div>
        <div class="row m-t-25"></div>
 <!--My contant start--> 
 <?php 
    if(isset( $halfday_delete_succesful)  and    $halfday_delete_succesful != ""){
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">success  <br></span> '
        . $halfday_delete_succesful.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }

    ?>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
<h4>All half day report</h4>
<br>
    <div class="row">
    <div class="col-sm-6">
        <a href="createhalfday.php" > <button type="button" class="btn btn-primary">Create Halfday</button> </a>
    </div>
    <div class="col-sm-6">
        <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group" data-table="staff-saerch"/>
    </div>
        <!-- <a href="createabsent.html" > <button type="button" class="btn btn-primary">Primary</button> </a>
                <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group col-lg-4" data-table="staff-saerch"/> -->
        </div>
        <table class="table table-borderless table-data3 staff-saerch">
        <thead style="background-color: #000080;">
            <tr>
                <th>#</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th colspan="2">Action</th>
                </tr>
        </thead>
        <?php 
             $permission =new Permission();
             $viewpermission= $permission->getAllStaffHalfday();
                foreach($viewpermission as $view){
     
        ?>
        <tbody>
        
        <tr>
            <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
            </span>
            </td>
            <td><?php echo $view['start_date']; ?></td>
            <td><?php echo $view['end_date']; ?></td>
            <td><?php echo $view['firstname']; ?></td>
            <td><?php echo $view['lastname']; ?></td>
           
            <td><a href="edithalfday.php?halfday=<?php echo $view['id']; ?>"><button type="button" class="btn btn-success mb-1" >Edit</button> </a>
            <a href="javascript:delete_halfday(<?php echo $view['id']; ?>)"> <button type="button" class="btn btn-danger mb-1 ">Delete</button> </a></td>
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
        <?php include ('../include/modal/edithalfday.php') ?>
        <?php include ('../include/modal/deletehalfday.php') ?>

  

           