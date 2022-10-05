<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	//var_dump($_POST);
	$course_id = $_POST["course_id"];
    $total_marks = $_POST["total_marks"];
    $total_question = $_POST["total_questions"];
    $test_name =$_POST["test_name"];
    
    
		$insert_query = "INSERT INTO test_details (course_id,test_name,total_marks,total_questions)  VALUES ('$course_id','$test_name','$total_marks','$total_question')";
       var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);

        }
        if ($row == TRUE) 
        {         
            header('Location:/views/teacher/add_evaluation.php?message=Test added successfully&bn='.$course_id);
        }
        else{ 
            echo 'not inserted';
          }
        


?>