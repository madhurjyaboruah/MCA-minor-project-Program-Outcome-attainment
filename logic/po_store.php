<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	//var_dump($_POST);
	$program_id = $_POST['program_id'];
    $po_title = $_POST["po_name"];
    $po_details = $_POST["po_details"];
    
    
		$insert_query = "INSERT INTO program_outcome(program_id,po_title,description)
        VALUES ('$program_id','$po_title','$po_details' )";
        var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);

        }
        if ($row == TRUE) 
        {         
            header('Location:/views/program/add_po.php?message=Program added successfully&bn='.$program_id);
        }
        else{ 
            echo '<script> not inserted</script>';
          }
        


?>