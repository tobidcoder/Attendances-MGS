
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
   
                 <?php include ('../include/modal/editstaff.php') ?>
                <?php include ('../include/modal/viewstaff.php') ?>
                <?php include ('../include/modal/deletestaff.php') ?>
    <script src="../include/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../include/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../include/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../include/vendor/slick/slick.min.js">
    </script>
    <script src="../include/vendor/wow/wow.min.js"></script>
    <script src="../include/vendor/animsition/animsition.min.js"></script>
    <script src="../include/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <!-- <script src="../include/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script> -->
    <script src="../include/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../include/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../include/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../include/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../include/js/main.js"></script>
    <script>
            (function(document) {
                'use strict';
    
            var TableFilter = (function(myArray) {
                var search_input;
    
                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }
    
                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);
    
            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });
    
        })(document);

    // Get DATA TO MODAL
    $(document).ready(function () {
         $('.editstaffbtn').on('cick', function(){
            $('#editstaff').modal('show');

             $tr = $(this).closest('tr');
             var data=$tr.children('td').map(function(){
                 return $(this).text();
              }).get();
             console.log($data);
                $('#staff_id').val(data[0]);
                $('#firstname').val(data[1]);
                $('#lastname').val(data[2]);
                // $('#username').val(data[3]);
                $('#email').val(data[4]);
            
        });

     });
    </script>
</body>

</html>
<!-- end document-->