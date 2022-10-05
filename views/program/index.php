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
<style>
  .navbar-custom {
            background-color: darkblue ;
        }

  body{
    background-color: rgba(218, 231, 237,0.5) !important;
    
  }

</style>
<!-- Modal -->
<link rel="stylesheet" href="/resources/css/bootstrap.min.css"> 


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
      <form action="/logic/program_insert.php" method="post">
				<div class="form-group">
					<label for="name">program Name:</label>
					<input type="text" name="program_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Program duration:</label>
					<input type="text" name="p_duration" class="form-control" required>
                </div>
				
			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">register</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <div class="container" style="padding: 1em;">
        <div class="jumbotron" style="background-color: white;">
            <div class="card border-0">
                <h2 style="margin-left: 2em;">Registered Program Details</h2>
              <div class="card-body">
                <button type="button" style="margin-left: 4em;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Program
                </button>
              </div> 
              <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Program Name</th>
                            <th>Program Duration</th>
                            <th>Action</th>
                          
                        </tr>
                        </thead>
                        <?php
                            require_once '../../db/db_connection.php';
                            $sql ="SELECT * FROM programe";
                            $res = mysqli_query($conn,$sql);
                      
                              while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                  <td><?php echo $row['program_id'];?></td>
                                  <td><?php echo $row['program_name'];?></td>
                                  <td><?php echo $row['program_duration'];?></td>
                  
                                
                                  <td>
                                  <a href="add_po.php?bn=<?php echo $row['program_id'];?>" class="btn btn-primary btn-md">View PO</a>
                                    <a href="/views/course/add_course.php?bn=<?php echo $row['program_id'];?>" class="btn btn-danger btn-md">View Courses</a>
                                    <!-- <a href="/views/course/editbook.php?bn=<?php echo $row['program_id'];?>" class="btn btn-primary btn-md">Edit</a>
                                    <a href="/views/course/deletebook.php?bn=<?php echo $row['program_id'];?>" class="btn btn-danger btn-md">Delete</a>
                                   -->
                                  </td>
                                </tr>
                                <?php
                              }
                            ?>
                          </table>
                      </div>
               <div class="col-md-2"></div>
           </div>

  
            </div>       
             <div>
           </div>
   
      </body>            
                        
                    
<?php include "../../views/global/footer.php"; ?>