<?php

require_once '../db/db_connection.php';



if ($_POST) {
	//var_dump($_POST);
	$cid = $_POST['cid'];
    $tid = $_POST["tid"];
    $sid = $_POST["sid"];
    $co_avg = $_POST["co_avg"];
    var_dump($_POST);
}
    
		 $insert_query = "INSERT INTO student_co(course_id,test_id,student_id,co_avg)
        VALUES ('$cid','$tid','$sid','$co_avg' )";
        var_dump($insert_query);
		 $row = mysqli_query($conn, $insert_query);

        
        if ($row == TRUE) 
        {         
            header('Location:/views/teacher/view_students.php');
        }
        else{ 
            echo '<script> not inserted</script>';
          }
        


?>