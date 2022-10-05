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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/logic/test_store.php" method="post">
				<div class="form-group">
					<label for="name">Test Name:</label>
					<input type="text" name="test_name" class="form-control" required>
				</div>
        <div class="form-group">
        <label for="exampleFormControlTextarea">Total Marks</label>
        <input type="text" name="total_marks" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea">Total questions:</label>
        <input type="text" name="total_questions" class="form-control" required>
        </div>
               
                
			 </div>
      
       <input type="hidden"  name="course_id" class="form-control" value="<?php echo $_GET['bn'];?>"  />
      
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
                <h2>Add Test Details</h2>
              <div class="card-body">

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Test Details
                </button>
              
              </div> 
              <div class="row">
                    <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                           
                            <th>Test title</th>
                            <th>Total Marks</th>
                         
                            <th>Actions</th>

                         
                          
                        </tr>
                        </thead>
                        <?php
                            require_once '../../db/db_connection.php';
                            $val = $_GET['bn'];
                            if(isset( $_GET['message'])){
                              
                           
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                '.$_GET['message'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button></div>';
                            }
                            $sql ="SELECT * FROM test_details where course_id= $val";
                            $res = mysqli_query($conn,$sql);
                      
                              while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                        
                                  <td><?php echo $row['test_name'];?></td>
                                  <td><?php echo $row['total_marks'];?></td>
                                 
                  
                                
                                  <td>
                                  <form class="form-inline" action="/views/teacher/qus_set.php" method="POST" >
                                    <input type="hidden" name="cid" value="<?php echo $row['course_id'];?>" >
                                    <input type="hidden" name="tid" value="<?php echo $row['id'];?>" >
                                    <input type="hidden" name="tname" value="<?php echo $row['test_name'];?>" >
                                   
                                   
                                    <button type="submit" class="btn btn-success btn-md">Set Questions</button>
                                   
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