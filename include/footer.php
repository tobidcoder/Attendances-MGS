<!--My footer start-->
</div>               
                       
                       </div>
                   </div>
               </div>
             
               <!-- END MAIN CONTENT-->
               <!-- END PAGE CONTAINER-->
         </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; 2019 Attendance MGS. All rights reserved.</small>
    </div>
    </footer>
       <!-- Jquery JS-->
       <script src="include/vendor/jquery-3.2.1.min.js"></script>
       <!-- Bootstrap JS-->
       <script src="include/vendor/bootstrap-4.1/popper.min.js"></script>
       <script src="include/vendor/bootstrap-4.1/bootstrap.min.js"></script>
       <!-- Vendor JS       -->
       <script src="include/vendor/slick/slick.min.js">
       </script>
       <script src="include/vendor/wow/wow.min.js"></script>
       <script src="include/vendor/animsition/animsition.min.js"></script>
       <script src="include/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
       </script>
       <script src="include/vendor/counter-up/jquery.waypoints.min.js"></script>
       <script src="include/vendor/counter-up/jquery.counterup.min.js">
       </script>
       <script src="include/vendor/circle-progress/circle-progress.min.js"></script>
       <script src="include/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
       <script src="include/vendor/chartjs/Chart.bundle.min.js"></script>
       <script src="include/vendor/select2/select2.min.js">
       </script>
   <script> 
    $(document).ready(function () {
        $('.createhalfdaybtn').on('cick', function(){
            $('#createhalfday').modal('show');
             

             $tr = $(this).closest('tr');

             var data=$tr.children('td').map(function(){
                 return $(this).text();
             }).get();

             console.log($data);
             $('#staff_id').val(data[0]);
             $('#firstname').val(data[1]);
            
        });

    });
    </script>
      <!-- Main JS-->
      <script src="include/js/main.js"></script>
      <!-- full calendar requires moment along jquery which is included above -->
      <script src="include/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
      <script src="include/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>
  
   </body>
   
   </html>
   <!-- end document-->
   