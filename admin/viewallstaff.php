<?php include_once ('../include/autoload.php');
    include ('../include/header1.php');
    // $staff_id = isset($_GET['staff']);
    // $staff_id =($_GET['staff']);
    $staff=new Staff();
    if(isset($_GET['delete_staff'])){
        $staff_id =($_GET['delete_staff']);
        $deletestaff=$staff->deleteStaff($staff_id);
        $staff_delete_succesful = 'Staff deleted successful. Thanks';
    }
?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">View All Staff</h2>
                                    
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
      <!--My contant start-->
       <!-- DATA TABLE-->
       <?php 
        if(isset( $staff_delete_succesful) and  $staff_delete_succesful != ""){
            echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">success  <br></span> '
            . $staff_delete_succesful.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }

        ?>
       <div class="table-responsive m-b-40">     
        <h3>
            <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group col-lg-4" data-table="staff-saerch"/>
                    </h3>
            <table class="table table-borderless table-data3 staff-saerch">
                <thead style="background-color: #000080;">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        
                        <th>Take action on staff</br></th>
                        
                    </tr>
                </thead>
        <?php
            $counter = 1;
            $staff =new Staff();
            $viewstaff = $staff->getAllStaff();
            foreach($viewstaff as $view){
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $view['firstname']; ?></td>
                        <td><?php echo $view['lastname']; ?></td>
                        <td><?php echo $view['email']; ?></td>
                        <td><a href="editstaff.php?staff=<?php echo $view['staff_id']; ?>"> <button type="button" class="btn btn-primary mb-1 ">Edit</button> </a> 
                        <a href="javascript:delete_data(<?php echo $view['staff_id']; ?>)"> <button type="button" class="btn btn-danger mb-1 ">Delete</button> </a> 
                        
                        
                        <!-- <a href="javascript:delete_data(<?php //echo $rowdata[0]; ?>)"><button class="btn btn-danger mb-1" onClick="return confirm('Do you really want to delete this staff?');">Delete<span class="glyphicon glyphicon-trash"></span></button></a>     -->
                        </td>
                    </tr>
                        
                 </tbody>

                 <?php 
                    $counter++;
                    } ?>   
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
 
                