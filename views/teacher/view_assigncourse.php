<?php
include "../../db/db_connection.php";
include "../global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'teacher') {
    header("Location:/views/dashboard.php");
   
  }
}else{
  header("Location:/views/auth/login.php");
}

?>
<div class="container" style="padding: 1em;">
        <div class="jumbotron">
            <div class="card">
            <center><h2>Assigned Course Details</h2></center>
              <div class="card-body">
                   
         <table class="table table-striped">
                        <thead>
                        <tr>
                         
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Action</th>
                            
                           
                          
                        </tr>
                        </thead>

<?Php

// $rows2 = array();
 $teacher_id = $_SESSION['ID'];
// var_dump($teacher_id);
 $query1  = "SELECT * FROM teacher where user_id='$teacher_id' ";
// $query1  = "SELECT * FROM course where teacher_id='3' ";
  $res = $conn->query($query1);
  $row = mysqli_fetch_assoc($res);
  $teacher_id = $row['id'];
  $teacher_name = $row['teacher_name'];
  var_dump($teacher_name);

 $query1  = " SELECT *
 FROM course
 INNER JOIN course_teacher ON course.course_id = course_teacher.course_id WHERE teacher_id='$teacher_id'; ";
 $res = $conn->query($query1);
 //var_dump($res);
while($row = mysqli_fetch_assoc($res)){
  ?>
  <tr>
    <td><?php echo $row['course_id'];?></td>
    <td><?php echo $row['course_name'];?></td>
    <td><?php echo $row['course_code'];?></td>
    <td> <a href="/views/teacher/add_evaluation.php?bn=<?php echo $row['course_id'];?>" class="btn btn-primary btn-md">View Evaluation</a></td>

  
   
  </tr>
  <?php
}
?>

 <?php include "../../views/global/footer.php"; ?>