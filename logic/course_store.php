<?php

require_once '../db/db_connection.php';

//echo "inserted";

if ($_POST) {
	//var_dump($_POST);
	//$teacher_id = $_POST["teacher"];
    $course_name = $_POST["course_name"];
    $course_code = $_POST["course_code"];
    $program_id =$_POST["program_id"];
   // echo $program_id;
    
		$insert_query = "INSERT INTO course (program_id,course_name, course_code)
        VALUES ('$program_id','$course_name','$course_code')";
        var_dump($insert_query);
		$row = mysqli_query($conn, $insert_query);
        $course_id = mysqli_insert_id($conn);;
        var_dump($course_id);
        
        }
        if ($row == TRUE) 
        {    $teachers =$_POST["teacher"];
            var_dump($row);

             foreach($teachers as $teacher){
                $insert_query = "INSERT INTO course_teacher (course_id,teacher_id) VALUES ('$course_id','$teacher')";
                $row = mysqli_query($conn, $insert_query);
                var_dump($insert_query);
                
             }
            header('Location:/views/course/add_course.php?message=course added successfully&bn='.$program_id);
        }
        else{ 
            echo '<script> not inserted</script>';
          }
        


?>