<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	//var_dump($_POST);
	$program_id = $_POST['course_id'];
    $po_title = $_POST["co_name"];
    $po_details = $_POST["co_details"];
    
    
		$insert_query = "INSERT INTO course_outcome(course_id,co_title,description)
        VALUES ('$program_id','$po_title','$po_details' )";
        var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);

        }
        if ($row == TRUE) 
        {         
            header('Location:/views/course/add_co.php?message=Course Outcome added successfully&bn='.$program_id);
        }
        else{ 
            echo '<script> not inserted</script>';
          }
        


?>
$program_id = $_POST['course_id'];
    $po_title = $_POST["co_name"];
    $po_details = $_POST["co_details"];
    $co_avg = $_POST["co_avg"];