<?php
include "../../db/db_connection.php";
include "../global/header.php";
if (!isset($_SESSION['ID'])) {
 
  header("Location:../../index.php");
}

?>
<?php


if ($_POST) {
	//var_dump($_POST);
	 $cid = $_POST['cid'];
     $id = $_POST['id'];
    $roll = $_POST["roll"];
    //var_dump($roll);
    // $po_details = $_POST["co_details"];
    
}
?>
<div class="container" style="padding: 1em;">
        <div class="jumbotron" style="background-color: white;">
            <div class="card border-0">
               <center><h2 style="margin-left: 2em;">CO/PO Mapping Details For Student <?php echo $roll?></h2></center> 
               <center><h2 style="margin-left: 2em;">Course Name: DBMS</h2></center> 
             <br>
              <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Course Attainment</th>
                            <th>PO1</th>
                            <th>PO2</th>
                            <th>PO3</th>
                            <th>PO4</th>
                            <th>PO5</th>
                            
                          
                        </tr>
                        </thead>
                        
                        <tr>
                           <td>DBMS</td>
                           <td>70%</td>
                            <td>40%</td>
                            <td>20%</td>
                            <td>20%</td>
                            <td>--</td>
                          
                            <td>20%</td>
                       </tr>
                    </table>
                    <center><button class="btn btn-primary">Calculate PO</button></center>
                    </div></div></div></div></div>

                    <br>
                    <div class="container">

                    <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
            
                            <th>PO1 attainment</th>
                            <th>PO2 attainment</th>
                            <th>PO3 attainment</th>
                           
                            <th>PO5 attainment</th>
                            <th>Overall Program Attainment</th>
                            
                          
                        </tr>
                        </thead>
                        
                        <tr>
                           
                            <td>28%</td>
                            <td>14%</td>
                            <td>14%</td>
            
                            <td>14%</td>
                            <td>70%</td>
                       </tr>
                    </table>
                    
                    </div></div></div>
            
                    </div>
              
            
                                
                            
