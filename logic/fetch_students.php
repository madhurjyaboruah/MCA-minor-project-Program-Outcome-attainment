<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	var_dump($_POST);
	$program_id = $_POST["program_id"];
    //$starting_year = $_POST["starting_year"]; 
    //$rows = array();
    
		//$search = "SELECT * FROM students where 'program_id' = '.$program_id.' and 'starting_year' = '.$starting_year.' ";
        $query1  = "SELECT * FROM students WHERE program_id = '$program_id'";
        $result1 = $conn->query($query1);
        if($result1->num_rows > 0){
            $rows = $result1->fetch_assoc();
       // $rows = $rows->fetch_assoc();
            include '../views/student/sadd.php';
        }
        else{ 
            echo '<script> not inserted</script>';
          }
        

        }
?>