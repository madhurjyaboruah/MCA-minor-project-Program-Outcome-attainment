<?php

require_once '../db/db_connection.php';
if ($_POST) {
	
	$UNAME = $_POST["user_name"];
    $PW = $_POST["password"];
    $EMAIL = $_POST["email"];
    $ROLE  = $_POST["role"];

$sql = "INSERT INTO users(name,password,email,role) VALUES ('$UNAME',  '$PW', '$EMAIL','$ROLE')";

var_dump($sql);

$row = $conn->query($sql);
if ($row === TRUE) 
{
  
  //echo "New record created successfully";
  $id = mysqli_insert_id($conn);
     if(strcmp($ROLE ,'student')==0)
     {
            echo 'THIS IS STUDENT';
           // echo'<pre>';
           // print_r($_POST);
            $SNAME =$_POST["student_name"];
            $PROGRAM_ID =$_POST["program_id"];
            $SROLL = $_POST["roll"];
          //  $SFNAME =$_POST["fathername"];
          //  $SMNAME =$_POST["mothername"];
            $SDOB =$_POST["dob"];
            $SGENDER =$_POST["gender"];
            $SPRONAME = $_POST["program_name"];
            $SSTARTYEAR =$_POST["starting_year"];
            $SENDYEAR =$_POST["end_year"];
          //  $SADDRESS =$_POST["saddress"];
           // $SCITY =$_POST["city"];
           //// $SSTATE =$_POST["sstate"];
           // $SPIN =$_POST["pincode"];
            //$SCOUNTRY =$_POST["country"];
            $SMOBILE =$_POST["mobile"];

        
             $sql1 = "INSERT INTO students(user_id, student_name,program_id, roll, fathername,mothername,dob,gender,program_name,startyear,endyear,saddress,city,sstate,pincode,country,mobile)
              VALUES('$id','$SNAME','$PROGRAM_ID','$SROLL','$SDOB','$SGENDER','$SPRONAME','$SSTARTYEAR','$SENDYEAR','$SMOBILE')";
             var_dump($sql1);
            $row =   $conn->query($sql1);
            if ($row == TRUE) 
            {         
                echo "New record created successfully";
            }
            else{ 
                echo 'falsee';
              }
      }        

      elseif(strcmp($ROLE ,'teacher')==0)
      {
              echo 'THIS IS TEACHER';
              echo'$_Post';
              $TNAME =$_POST["teacher_name"];
              $DESIG = $_POST["desig"];
              $DOB =$_POST["dob"];
              $GENDER =$_POST["gender"];
              $MOBILE =$_POST["mobile"];
              $sql = "INSERT INTO teacher(user_id,teacher_name,teacher_age,teacher_designation,gender,mobile) VALUES ('$id', '$TNAME',  '$DOB', '$DESIG', '$GENDER','$MOBILE')";
              $row = $conn->query($sql);

              var_dump($sql);
              
              if ($row === TRUE) 
              {
                  echo "New record created successfully";
              }
              else
              { 
                  echo 'falsee';
              }

      }

 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>

 
