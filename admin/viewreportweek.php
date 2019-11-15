<?php 
    include_once ('../include/autoload.php');
    include ('../include/header1.php');
    $staff_id= isset($_GET['staff']);
        $staff_id = $_GET['staff'];
    
?>
                <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">View staff report</h2>
                                  
                                       
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
 <!--My contant start-->
    
             <!-- DATA TABLE-->
             <div class="table-responsive m-b-40"> 
                    <br>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                    <?php $staff = new Staff();
                        $viewstaff = $staff->getOneStaff($staff_id);
                        foreach ($viewstaff as $view){
                     ?> 
                 <h3><span class="badge badge-primary"> <?php  echo $view['firstname']?>,  <?php echo $view['lastname']?> </span>  : This week report</h3>  
                 <?php } ?>
                    <h3>
                        <input style="margin-left: auto; float: rigth;" type="search" placeholder="Search..." class="form-control search-input input-group form-group col-lg-4" data-table="staff-saerch"/>
                             </h3>
                            
                        <table class="table table-borderless table-data3 staff-saerch">
                        <thead style="background-color: #000080;">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Clock in Time</th>
                                <th>Clock Out Time</th>
                                <th>Comment</th>
                                <th>Clocked in Status</th>
                                <th>Change Status</th>
                                
                            </tr>
                        </thead>
                <?php 
                    $counter = 1;
                    $attendance = new Attendance;
                    $attenweek=$attendance->getStaffthisWeekReport($staff_id);
                    foreach($attenweek as $view){
                 
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $view['day'],
                                "<br \>", $view['clockin_date'] ?></td>
                                <td><?php echo $view['clock_in']; ?></td>
                                <td><?php echo $view['clock_out']; ?></td>
                                <td><?php echo $view['comment']; ?></td>
                                <td><?php echo $view['clockin_status']; ?></td>
                                <td><a href="editabsent.php?absent=<?php echo $view['id']; ?>"><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editpermission">Change </button></a>
                            </tr>
                           
                            
                        </tbody>
                <?php $counter++;  } ?>
                    </table>

                    <!-- <nav aria-label="Page navigation example">
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
                    </nav> -->
                </div>
        <!-- END DATA TABLE-->   
    
 <?php include ('../include/footer1.php') ?>