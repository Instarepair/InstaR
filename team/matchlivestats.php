<?php 
include('../db.php');
include('functionstats.php');

include('api/function_api.php');


require_once 'api/lzconfig.php';
require_once 'api/lz.php';



if(isset($_GET['logout']))
{

signoutuser();



}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panga Cricket</title>
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />


      <script src="assets/js/custom-scripts.js"></script>
    


   <script>


    function refreshTable(){ 


      $('#entirematchstats').load('currentloadergame.php?showmatch=icc_wc_t20_2016_g6', function(){
           setTimeout(refreshTable,5000);

            });

    }





</script>
</head>
<body onload='refreshTable()'>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

<!-- ==================== view match api starts here =================================== -->

       <div class="row" id='entirematchstats'>

<!-- ============= add match ends here =========================================== -->


            </div>
                <!-- /. ROW  -->


<!--= =============  VIEW API ENDS HERE  ========================================== -->


<!-- ============= ADD LEAGUE TABLES STARTS HERE ============================= -->






<!-- =========== ADD LEAGUE TABLE ENDS HERE ================================ -->

        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
  
</body>
</html>
