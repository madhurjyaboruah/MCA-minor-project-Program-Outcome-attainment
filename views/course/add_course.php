<?php
include "../../views/global/header.php";
  if (isset($_SESSION['ID'])) {
    if($_SESSION['ROLE'] != 'admin') {
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
      <form action="/logic/course_store.php" method="post">
				<div class="form-group">
					<label for="name">Course Name:</label>
					<input type="text" name="course_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Course Code:</label>
					<input type="text" name="course_code" class="form-control" required>
                </div>
               
                <div class="form-group">
								<label for="course instructor">course instructor:</label>
                <div class="form-check">
                  
                <?php 
                                         require_once '../../db/db_connection.php';
                                         $sql ="SELECT * FROM teacher";
                                         $res = mysqli_query($conn,$sql);
                                         while($row = $res->fetch_assoc()){
                                             $professor = $row['teacher_name'];
                                             echo " <input class='form-check-input' name='teacher[]' type='checkbox' value=".$row['id']." id=".$row['id'].">
                                               <label class='form-check-label' for=".$row['id'].">$professor</label></br> ";
                                            
                                         }
			

                                        ?>
                  
                </div>
							
                </div>
			 </div>
      
       <input type="text"  name="program_id" class="form-control" value="<?php echo $_GET['bn'];?>"  />
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">register</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Resigtered Course Details</h2>
              <div class="card-body">

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Course
                </button>
              
              </div> 
              <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Instructor</th>
                          
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
                            $sql ="SELECT * FROM course where program_id= $val";
                            $res = mysqli_query($conn,$sql);
                      
                              while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                  <td><?php echo $row['course_id'];?></td>
                                  <td><?php echo $row['course_name'];?></td>
                                  <td><?php echo $row['course_code'];?></td>
                  
                                
                                  <td>
                                
                                  <form class="form-inline" action="/views/student/student_list.php" method="POST" >
                                    <input type="hidden" name="cid" value="<?php echo $row['course_id'];?>" >
                                    <input type="hidden" name="pid" value="<?php echo $_GET['bn'];?>" >
                                   
                                    <a href="/views/course/add_co.php?bn=<?php echo $row['course_id'];?>" class="btn btn-primary btn-md">View CO</a>


<!--                                   
                                    <a href="editbook.php?bn=<?php echo $row['course_id'];?>" class="btn btn-primary btn-md">Edit</a>
                                    <a href="deletebook.php?bn=<?php echo $row['course_id'];?>" class="btn btn-danger btn-md">Delete</a> -->
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