<?php
include "../global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'admin') {
    header("Location:/views/dashboard.php");
    exit();
  }
}else{
  header("Location:/views/auth/login.php");
}
include "../../db/db_connection.php";
?>
<div class="container">
  <div style="padding: 1em;"><h3>Enrolled Students</h3></div>
  <div class="col col-md-8">
                   
         <table class="table table-striped">
                        <thead>
                        <tr>
                         
                            <th>Student ID</th>
                            <th>Student Roll</th>
                            <th>Student Name</th>
                          
                        </tr>
                        </thead>

<?Php
if($_POST){ 
 $program_id = $_POST["pid"];
 $cid =$_POST['cid'];    
}else{

  $program_id = $_GET["pid"];
 $cid =$_GET['cid'];
}

$rows = array();
// $rows2 = array();
 //$query1  = "SELECT * FROM students  WHERE program_id ='$program_id' and startyear='$starting_year'";
  $query2 = "SELECT course_student.student_id, students.student_name , students.roll
  FROM course_student 
  INNER JOIN students
  ON course_student.student_id =students.id 
  WHERE  course_student.course_id ='$cid' ";

  $res = $conn->query($query2);

while($row = mysqli_fetch_assoc($res)){
  ?>
  <tr>
    <td><?php echo $row['student_id'];?></td>
    <td><?php echo $row['roll'];?></td>
    <td><?php echo $row['student_name'];?></td>
 

  
   
  </tr>
  <?php
}
?>
</table>
<form action="/views/student/sadd.php" method="POST">
<input type="hidden" id="country" name="cid" value="<?php echo $cid?>" >
 <input type="hidden" id="country" name="pid" value="<?php echo $program_id?>" >

  <button type="submit" class="btn btn-primary">Add Student</button>
</form> 

<?php if(isset( $_GET['message'])){ 
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 '.$_GET['message'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button></div>';
}?>
 <?php include "../../views/global/footer.php"; ?>