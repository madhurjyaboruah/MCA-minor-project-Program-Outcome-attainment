<?php

require_once 'db/db_connection.php';

//echo "inserted";
$items= array();
if ($_POST) {
	//var_dump($_POST);
	$items = $_POST["cid"];
    echo implode(",",$items);
   // var_dump($_POST["cid"]);
    $student_id = $_POST["sid"];
  
    
    //var_dump(count( $_POST["students"]));
    foreach( $_POST["cid"] as $items){
		$insert_query = "INSERT INTO course_student (course_id,student_id) VALUES ('$items','$student_id')";
      // var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);
       // var_dump($row);
    }
        }
        if ($row == TRUE) 
        {         
            header('Location:dashboard.php');
           
        }
        else{ 
            $message = "student entry already exist";
            header('Location:dashboard.php');
          }



?>