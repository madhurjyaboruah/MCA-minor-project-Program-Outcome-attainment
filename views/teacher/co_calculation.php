<?php
require_once '../../db/db_connection.php';
include "../../views/global/header.php";
if (isset($_SESSION['ID'])) {
    if ($_SESSION['ROLE'] != 'teacher') {
        header("Location:/views/dashboard.php");
        exit();
    }
} else {
    header("Location:/views/auth/login.php");
}

if ($_POST) {
	//var_dump($_POST);
	
    $course_id = $_POST["cid"];
    $test_id = $_POST["tid"];
    $total_question = $_POST["question"];
    $query2 = "SELECT * from course_outcome
    WHERE course_id ='$course_id' ";
    
    
           $res = $conn->query($query2);
           $row = mysqli_fetch_assoc($res);
           
   // echo $total_question;
    echo '<div class="container">';
    echo ' <div class="col col-md-8">';
    echo "<table class='table-striped'><tr>";
}
    
 //echo "<th>".$i. "</th>";
// $i++;

// echo "</tr>";
// echo'</table>';
// echo'</div>';
?>
<div >
  <div style="padding: 1em;"><h3>CO Calculation</h3></div>
  <div class="col-12">
                   
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <?php $i = 0;
    while ($i < $total_question)
    { ?> 
      <th scope="col"><?php echo 'Question '.$i;?></th>
      <?php $i++; }
 ?>
    </tr>
        


  </thead>
  <tbody>
  <?php
    
     
      ?>
    <tr>
      <th scope="row"></th>
      <?php $i = 0;
              while ($i < $total_question)
          { ?> 
              <td scope="col">
                  <select name="" id="">
                     
          <?php  
           $rows = array();
           $query2 = "SELECT * from course_outcome
           WHERE course_id ='$course_id' ";
           
                  $res = $conn->query($query2);
                 // $rows = mysqli_fetch_assoc($res); 
              while($row = mysqli_fetch_assoc($res)){ ?>
               <option value=""><?php echo $row['co_title'];?></option>
                                            
           <?php } ?>
            </select>
            </td>
      
      <?php $i++; }
 ?>
    </tr>
   



      <?php
     $rows = array();
     // $rows2 = array();
      //$query1  = "SELECT * FROM students  WHERE program_id ='$program_id' and startyear='$starting_year'";
       $query2 = "SELECT course_student.student_id, students.student_name , students.roll
       FROM course_student 
       INNER JOIN students
       ON course_student.student_id =students.id 
       WHERE  course_student.course_id ='$course_id' ";
     
       $res = $conn->query($query2);
     
     while($row = mysqli_fetch_assoc($res)){ ?>
    <tr>
      <th scope="row"><?php echo $row['roll'];?></th>
      <?php $i = 0;
    while ($i < $total_question)
    { ?> 
      <td scope="col"><?php echo '<input type="text" name="'.$i.'" ';?></td>
      <?php $i++; }
 ?>
    </tr>
    <?php
}
?>
    
  </tbody>
</table>
  </div>


<?php include "../../views/global/footer.php"; ?>