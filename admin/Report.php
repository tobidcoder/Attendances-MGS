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
                                    <h2 class="title-1">Staff Report</h2>
                                    
                                </div>
                            </div>
                        </div>
         <div class="row m-t-25"></div>
      <!--My contant start-->
       <!-- DATA TABLE-->
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
                        <th><center>View Report</center></th>
                        
                        
                    </tr>
                </thead>
                <?php 
                        $staff =new Staff();
                        $viewstaff = $staff->getAllStaff();
                        foreach($viewstaff as $view){
                    ?>
                <tbody>
                    <tr>
                        <td><?php echo $view['staff_id'] ?></td>
                        <td><?php echo $view['firstname'] ?> </td>
                        <td><?php echo $view['lastname'] ?></td>
                       <td><?php echo $view['email'] ?></td>
                        <td><a href="viewreportweek.php?staff=<?php echo $view['staff_id'] ?> "><button type="button" class="btn btn-primary btn-sm">This week</button></a>
                            <a href="viewreportmonth.php?staff=<?php echo $view['staff_id'] ?> "> <button type="button" class="btn btn-success btn-sm">This Month</button></a>
                            <a href="viewreport.php?staff=<?php echo $view['staff_id'] ?> "><button type="button" class="btn btn-primary btn-sm">More</button> </td></a>
                        </tr>
                        
                 </tbody>
                        <?php } ?>
            </table>
        </div>
        <!-- END DATA TABLE-->                                                                  
        <?php include ('../include/footer1.php') ?>