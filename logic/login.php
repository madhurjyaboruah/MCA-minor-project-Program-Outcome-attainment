<?php
//var_dump("helo");
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:../dashboard.php");
      exit();
  }
  // Include database connectivity
    
  include_once('../db/db_connection.php');
  
  if (isset($_POST['submit'])) {
      $errorMsg = "";
      $username = $conn->real_escape_string($_POST['user_name']);
      $password = $conn->real_escape_string($_POST['password']);
      
  if (!empty($username) || !empty($password)) {
        $query  = "SELECT * FROM users WHERE name = '$username'";
        $result = $conn->query($query);
        if($result->num_rows > 0){
          $query1  = "SELECT * FROM users WHERE name = '$username' and password = '$password'";
        $result1 = $conn->query($query1);
        if($result1->num_rows > 0){
            $row = $result1->fetch_assoc();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['NAME'] = $row['name'];
            if($_SESSION['ROLE']=='admin'){
              header("Location:../../dashboard.php");

            }
            else {
              header("Location:../views/teacher/view_assigncourse.php");

            }
           
            die();
        }else{
          $errorMsg = "Password mismatched";
          echo $errorMsg;
        }                              
        }else{
          $errorMsg = "No user found on this username";
          echo $errorMsg;
        } 
    }else{
      $errorMsg = "Username and Password is required";
      echo $errorMsg;
    }
  }
?>