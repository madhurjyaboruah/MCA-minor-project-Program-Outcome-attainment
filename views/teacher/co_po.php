<?php
include "../../db/db_connection.php";
include "../global/header.php";
if (!isset($_SESSION['ID'])) {
 
  header("Location:../../index.php");
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
                         
                            <th>Student Roll</th>
                            <th>Student Name</th>
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

 $query1  = " SELECT *
 FROM course
 INNER JOIN course_teacher ON course.course_id = course_teacher.course_id WHERE teacher_id='$teacher_id'; ";
 $res = $conn->query($query1);
 $row = mysqli_fetch_assoc($res);
 $cid= $row['course_id'];
 $query2  = "SELECT * FROM course_student INNER JOIN students ON course_student.student_id=students.id where course_id='$cid' ";
 //var_dump($query1);
 $res = $conn->query($query2);
//$row = mysqli_fetch_assoc($res);
 //var_dump($row);
while($row = mysqli_fetch_assoc($res)){
  ?>
  <tr>
    <td><?php echo $row['roll'];?></td>
    <td><?php echo $row['student_name'];?></td>
    <td>
    <form class="form-inline" action="po_calculation.php" method="POST" >
    <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
    <input type="hidden" name="roll" value="<?php echo $row['roll'];?>" >
    <input type="hidden" name="cid" value="<?php echo $cid;?>" >

    <button type="submit">Mapped CO-PO</button>

    </td>
    </tr>
     <?php }?>
 
 <?php include "../../views/global/footer.php"; ?>