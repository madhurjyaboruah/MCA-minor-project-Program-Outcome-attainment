<?php

require_once '../db/db_connection.php';

//echo "inserted";
$items= array();
if ($_POST) {
	//var_dump($_POST);
	$items[] = $_POST["students"];
    $course_id = $_POST["cid"];
    $program_id = $_POST["pid"];
    //echo $program_id;
    
    //var_dump(count( $_POST["students"]));
    foreach( $_POST["students"] as $item){
		$insert_query = "INSERT INTO course_student (course_id,student_id) VALUES ('$course_id','$item')";
        //var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);
    }
        }
        if ($row == TRUE) 
        {         
            header('Location:/views/student/student_list.php?cid='.$course_id.'&pid='.$program_id);
        }
        else{ 
            $message = "student entry already exist";
            header('Location:/views/student/student_list.php?cid='.$course_id.'&pid='.$program_id.'&message='.$message);
          }
        


?>