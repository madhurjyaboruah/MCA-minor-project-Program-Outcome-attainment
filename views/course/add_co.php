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
<style>
  body{
    background-color: rgba(218, 231, 237,0.5) !important;
    
  }

</style>

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
      <form action="/logic/co_store.php" method="post">
				<div class="form-group">
					<label for="name">CO title:</label>
					<input type="text" name="co_name" class="form-control" required>
				</div>
        <div class="form-group">
        <label for="exampleFormControlTextarea">CO Details</label>
        <textarea class="form-control" name="co_details" id="exampleFormControlTextarea1" rows="3"></textarea>
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
<body>

    <div class="container" style="padding: 1em;">
        <div class="jumbotron">
            <div class="card">
                <h2>Resigtered Course Details</h2>
              <div class="card-body">

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add CO
                </button>
              
              </div> 
              <div class="row">
                    <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                           
                            <th>CO title</th>
                            <th>Outcome Details</th>
                         
                          
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
                            $sql ="SELECT * FROM course_outcome where course_id=$val";
                            $res = mysqli_query($conn,$sql);
                      
                              while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                  <td><?php echo $row['co_title'];?></td>
                                  <td><?php echo $row['description'];?></td>
                              
                                
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