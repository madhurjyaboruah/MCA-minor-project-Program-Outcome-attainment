<?php
include "../views/global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'admin') {
    header("Location:/views/dashboard.php");
    exit();
  }
}else{
  header("Location:/views/auth/login.php");
}
include "../db/db_connection.php";
?>
<div class="container">
  <div class="col col-md-8">
                   
         <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Program ID</th>
                            <th>Student Name</th>
                            <th>Student Roll</th>
                          
                        </tr>
                        </thead>

<?Php
if($_POST){ 
 $program_id = $_POST["program_id"];
 $cid =$_POST['cid'];
 echo $cid;
 echo $program_id;
 $starting_year = $_POST["starting_year"]; 
$rows = array();
// $rows2 = array();
 $query1  = "SELECT * FROM students  WHERE program_id ='$program_id' and startyear='$starting_year'";
//  $query2 = "SELECT *
//  FROM students 
//   JOIN programe
//  ON students.program_id =programe.program_id";
 

      $res = $conn->query($query1);
     
     
}

while($row = mysqli_fetch_assoc($res)){
?>
<form action="/logic/student_course_add.php" method="post">
  <tr>
  <td>
      <input type="checkbox" name="students[]" value="<?php echo $row['id'];?>" id="">  
      </td>
    <td><?php echo $row['program_id'];?></td>
    <td><?php echo $row['student_name'];?></td>
    <td><?php echo $row['roll'];?></td>
    <input type="hidden" id="country" name="cid" value="<?php echo $cid?>" >
    <input type="hidden" id="country" name="pid" value="<?php echo $program_id?>" >
  
  </tr>
<?php } ?>
</table>
<button type="submit" class="btn btn-primary" >Add student</button>
 </form>
</div>
</div>
</div>