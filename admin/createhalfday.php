<?php
    include_once ('../include/autoload.php');
    include ('../include/header1.php');
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Set half day Resumption for staff</h2>
                                    
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
            <a href="viewallhalfday.php" > <button type="button" class="btn btn-primary">View Halfday</button> </a>
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
                <th><span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
        </thead>
        
        <tbody>
        <?php 
           $staff = new staff;
            $viewstaff = $staff->getAllStaff();
            foreach ($viewstaff as $view){
                $count=1;
        ?>
        <tr>
            <td> <?php echo $view['staff_id'] ?>
            </td>
            <td><?php echo $view['firstname'] ?> </td>
            <td><?php echo $view['lastname'] ?></td>
            <td><?php echo $view['email'] ?></td>
            <td><a href="halfday.php?staff=<?php echo $view['staff_id']; ?>"> <button type="button" class="btn btn-primary mb-1" >Set halfDay</button></a>
            <!-- <a href="halfdaystaff.php?id=<?php echo $view['staff_id']; ?>"> <button type="button"  class="btn btn-success mb-1">View halfday</button> </a>  -->
                  </td>
        </tr>
            <?php } ?>    
         </tbody>
           
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
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createhalfday"> Set for One Day</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">           
            <form action="" method="post" class="">  
            <input type="text" id="staff_id" class="form-control" value="<?php echo $view['staff_id']; ?>" idden> 
            <div class="row form-group">
                <div class=" col-md-3">
                        <label for="select" class=" form-control-label">Set date</label>
                    </div>
                    
                    <div class="col-6 col-md-3"> 
                        <div class="col-6 col-md-9">
                                <label for="text-input" id="firstname" class=" form-control-label">Start Date:</label>
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
                        <label for="select" class=" form-control-label">Select Day:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="recuring_day" id="select" class="form-control">
                            <option value="">Every</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednessday">Wednessday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            </select>
                    </div>
                 </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" name="search">
                        <i class="fa fa-star"></i>&nbsp;Set Half day</button>   
                </div>
                                                                           
                </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- end modal medium -->

    <!-- modal medium -->
<div class="modal fade" id="viewhalfday" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edithalfday"> View Halfday</h5>
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
                                <th>Satrt Date</th>
                                <th>End Date</th>
                                <th>Day</th>
                                </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>10/24/2019</td>
                            <td>10/24/2019</td>
                            <td>Monday</td>
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
