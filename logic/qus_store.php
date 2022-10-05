<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	//var_dump($_POST);
	//$teacher_id = $_POST["teacher"];
    $course_name = $_POST["cid"];
    $test_name = $_POST["tid"];
    $qus_number = $_POST["qus_number"];
    $total_marks = $_POST["total_marks"];
    $question_details= $_POST["question"];
    $waitage= $_POST["waitage"];
   

            // foreach($teachers as $teacher){
               $insert_query = "INSERT INTO test_element(test_id,course_id,qus_number,question,total_marks,waitage)
               VALUES ('$test_name','$course_name','$qus_number','$question_details','$total_marks','$waitage')";
         
              // var_dump($insert_query);
              $row = mysqli_query($conn, $insert_query);
               $q_id = mysqli_insert_id($conn);;
               var_dump($q_id);
               
               }
               if ($row == TRUE) 
               {    $teachers =$_POST["co"];
                   var_dump($row);
       
                    foreach($teachers as $teacher){
                       $insert_query = "INSERT INTO question_co (question_id,co_title) VALUES ('$q_id','$teacher')";
                       $row = mysqli_query($conn, $insert_query);
                       
                       
                    }
                    header('Location:/views/teacher/qus_set.php?message=question added successfully');  
               }

        else{ 
            echo '<script> not inserted</script>';
          }
      


?>