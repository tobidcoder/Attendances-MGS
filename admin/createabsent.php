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
                    $staff =new Staff();
                    $viewstaff = $staff->getAllStaff();
                    foreach($viewstaff as $view){
                ?>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo $view['firstname']; ?></td>
                    <td><?php echo $view['lastname']; ?></td>
                    <td><?php echo $view['email']; ?></td>
                    <td><a href="absent.php?staff=<?php echo $view['staff_id']; ?>"> <button type="button" class="btn btn-primary mb-1" data-toggle="modal">Grant Permission</button> </a>
                        <!-- <button type="button"  class="btn btn-success mb-1" data-toggle="modal" data-target="#viewpermission">View Permission</button>    </tr> -->
                          
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
          <!-- One day modal medium -->
          <div class="modal fade" id="grantpermission" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"> Set Permission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">           
                            <form action="" method="post" class="">   
                                <div class="row form-group">
                                <div class=" col-md-3">
                                    <label for="select" class=" form-control-label">Select date</label>
                                </div>
                                
                                    <div class="col-6 col-md-3"> 
                                    <div class="col-6 col-md-9">
                                            <label for="text-input" class=" form-control-label">Start Date:</label>
                                            </div>
                                        <input type="date" placeholder="pick-start-date" class="form-control">
                                    </div> 
                                    <div class="col-6 col-md-3"> 
                                    <div class="col-6 col-md-8">
                                            <label for="text-input" class=" form-control-label">End Date:</label>
                                            </div>
                                        <input type="date" placeholder="pick-end-date" class="form-control">
                                    </div>       
                                </div>
                                
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <textarea name="description" id="description" rows="5" placeholder="Content..." class="form-control"></textarea>
                                    </div>
                                </div>    
                                
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="search">
                                <i class="fa fa-star"></i>&nbsp;Grant Permission</button>   
                        </div>
                                                                                   
                        </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
       
            <!-- modal medium -->
        <div class="modal fade" id="viewpermission" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewpermission"> View Permission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">           
                                <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <h4>Satff 1: All half day repoprt</h4>
                            <br>
                            <table class="table table-borderless table-data3">
                                <thead style="background-color: #000080;">
                                    <tr>
                                        <th>#</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>10/24/2019</td>
                                    <td>10/31/2019</td>
                                </tr>
                                       
                                            </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE--> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
       
             
