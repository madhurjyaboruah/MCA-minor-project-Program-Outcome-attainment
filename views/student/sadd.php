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
    <div class="container" style="padding: 1em;">
    <div class="card">
  <div class="card-header">
  Registered Student Details
  </div>
                <?php 
                 require_once '../../db/db_connection.php';
                if($_POST)
               
                {
                  $cid = $_POST["cid"];
                  $pid = $_POST["pid"];
                  echo $cid;
                  echo $pid;
                  
                 $sql ="SELECT * FROM programe where program_id='$pid'";
                $res = mysqli_query($conn,$sql);
                 $row = $res->fetch_assoc();
                }
                // echo $row['program_name'];
                
                   ?>
  <div class="card-body">
        <form class="form-inline" action="/logic/add" method="POST">
        <div class="form-group">
          <label for="email">PROGRAM:</label>
          <input type="text" id="country" name="program_id" value="<?php echo $row['program_id']?>" readonly>
          <input type="hidden" id="country" name="cid" value="<?php echo $cid?>" >

        </div>
        <div class="form-group" style="padding-left:1em;">
        <label for="email">YEAR:</label>
        <select class="form-control" name="starting_year">
          <option selected>Enrolled year</option>
          <?php 
          $i =1995;
          while($i<=date("Y")){
            echo '<option value="'.$i.'">'.$i.'</option>'  ;
            $i++;
          }
          ?>
        </select>
        </div>
        <div class="form-group" style="padding-left:1em;">
        <button  type="submit" class="btn btn-primary mb-2">Go</button>
        </div>
        
      </form>

 
    
  
  
</form>
  </div>
</div>

  <tbody>
   


    </div>
</body>
</html>