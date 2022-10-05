<?php
require_once '/db/db_connection.php';
if ($_POST) {
	
	$PNAME = $_POST["program_name"];
    $PD = $_POST["p_duration"];
   
 
$sql = "INSERT INTO programe(program_name,program_duration) VALUES ('$PNAME',  '$PD')";

//var_dump($sql);

$row = $conn->query($sql);
}
if ($row == TRUE) 
{         
    header('Location:/views/program/program_register.php?message=Program added successfully');
}
else{ 
    echo '<script> not inserted</script>';
  }


?>
