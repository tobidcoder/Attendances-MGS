<?php 
    include_once('../include/autoload.php');
    include ('../include/header1.php');
 ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Set absent with Permission</h2>
                                   
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
 <!--My contant start-->
   
     <!-- DATA TABLE-->
     <div class="table-responsive m-b-40">
     
        <br>
        <div class="row">
        <div class="col-sm-6">
            <a href="viewallpermission.php" > <button type="button" class="btn btn-primary">View Permission</button> </a>
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                </thead>
                <?php 
                    $count =1;
                    $staff =new Staff();
                    $viewstaff = $staff->getAllStaff();
                    foreach($viewstaff as $view){
                        
                ?>
                <tbody>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $view['firstname']; ?></td>
                    <td><?php echo $view['lastname']; ?></td>
                    <td><?php echo $view['email']; ?></td>
                    <td><a href="absent.php?staff=<?php echo $view['staff_id']; ?>"> <button type="button" class="btn btn-primary mb-1" data-toggle="modal">Grant Permission</button> </a>
                        <!-- <button type="button"  class="btn btn-success mb-1" data-toggle="modal" data-target="#viewpermission">View Permission</button>    </tr> -->
                          
                         </tbody>
                    <?php $count++; } ?>
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
         