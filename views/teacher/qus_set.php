<?php
include "../../views/global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'teacher') {
    header("Location:/views/dashboard.php");
    exit();
  }
}else{
  header("Location:/views/auth/login.php");
}
?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Question Paper Set</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../../logic/qus_store.php" method="post">
				<div class="form-group">
					<label for="name">Question Number:</label>
					<input type="text" name="qus_number" class="form-control" required>
				</div>

        <div class="form-group">
        <label for="exampleFormControlTextarea">Total Marks</label>
        <input type="text" name="total_marks" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea">Enter Question</label>
        <input type="text" name="question" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea">Question Waitage</label>
        <input type="text" name="waitage" class="form-control" required>
        </div>
       
        <div class="form-group">
								<label for="course instructor">Mapped Course Outcome:</label>
                <div class="form-check">
                  
                  <?php 
                                           require_once '../../db/db_connection.php';
                                           if($_POST){
                                            $cid = $_POST["cid"];
                                            $tid = $_POST["tid"];
                                          }
                                           $sql ="SELECT * FROM course_outcome WHERE course_id=$cid";
                                   
                                           $res = mysqli_query($conn,$sql);
                                           while($row = $res->fetch_assoc()){
                                               $professor = $row['description'];
                                               echo " <input class='form-check-input' name='co[]' type='checkbox' value=".$row['co_title']." id=".$row['id'].">
                                                 <label class='form-check-label' for=".$row['id'].">$professor</label></br> ";
                                              
                                           }
        
  
                                          ?>
                    
                  </div>
                  
                </div>
         </div>
		           
         <input type="hidden"  name="cid" class="form-control" value="<?php echo $cid;?>"> 
         <input type="hidden"  name="tid" class="form-control" value="<?php echo $tid;?>"> 
    
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">register</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <div class="container" style="padding: 1em;">
        <div class="jumbotron">
            <div class="card">
                <h2><?php  $tname =$_POST["tname"]; echo $tname?> Question  Details</h2>
              <div class="card-body">

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Questions
                </button>
              
              </div> 
              <div class="row">
                    <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                           
                            <th>Question Description</th>
                            <th>Total Marks</th>
                            <th>Waitage </th>
                            <th>Mapped CO's</th>

                         
                          
                        </tr>
                        </thead>
                        <?php
                            require_once '../../db/db_connection.php';
                            if($_POST){
                              $cid = $_POST["cid"];
                              $tid = $_POST["tid"];
                              $tname =$_POST["tname"];
                              
                            }
                          //  $val = $_GET['bn
                            if(isset( $_GET['message'])){
                              
                           
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                '.$_GET['message'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button></div>';
                            }
                            $sql ="SELECT * FROM test_element INNER JOIN question_co ON test_element.id=question_co.question_id WHERE test_id= $tid";
                            
                            $res = mysqli_query($conn,$sql);
                            //var_dump($res);
                              while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                        
                                  <td><?php echo $row['question'];?></td>
                                  <td><?php echo $row['total_marks'];?></td>
                                  <td><?php echo $row['waitage'];?></td>
                                  <td><?php echo $row['co_title'];?></td>
                                  

                  
                                
                                  <td>
                                  <!-- <form class="form-inline" action="/views/teacher/co_calculation.php" method="POST" >
                                    <input type="hidden" name="cid" value="<?php echo $row['course_id'];?>" >
                                    <input type="hidden" name="tid" value="<?php echo $row['id'];?>" >
                                    <input type="hidden" name="question" value="<?php echo $row['total_questions'];?>" > -->
                              
                                   
                                  </form>
                                  </td>
                                  </form>
                                  </td>
                                </tr>
                                <?php
                              }
                            ?>
                          
                          </table>
                      </div>
             
           </div>

  
            </div>       
             <div>
           </div>
   
               
                        
           <?php include "../../views/global/footer.php"; ?>