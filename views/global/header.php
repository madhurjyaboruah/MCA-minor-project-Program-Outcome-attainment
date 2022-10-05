<?php ?>

<!DOCTYPE html>
<html>

<head>
  <title>PO/CO</title>
  <link rel="stylesheet" href="/resources/css/bootstrap.min.css"> 
</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#">PO/CO Attainment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
       -->
     <?php session_start();
     if(! isset($_SESSION['ID'])){ ?>
      <li class="nav-item">
        <a class="nav-link " href="/views/auth/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Registration</a>
      </li>
      <?php
     
      

    
    }else{
      if($_SESSION['ROLE'] == 'admin'){
        echo ' 
      <li class="nav-item">
      <a class="nav-link " href="/views/program/">Programme</a>
    </li>
      ';
      echo ' 
      <li class="nav-item">
      <a class="nav-link " href="/views/users/users/">Registration</a>
    </li>';
    echo ' 
    <li class="nav-item">
    <a class="nav-link " href="../../dashboard.php">Dashboard</a>
  </li>';
      }
      if($_SESSION['ROLE'] == 'student'){
        echo ' <li class="nav-item">
        <a class="nav-link " href="#">Student</a>
      </li>';
    }

      
      if($_SESSION['ROLE'] == 'teacher'){
        echo ' <li class="nav-item">
        <a class="nav-link " href="../teacher/view_assigncourse.php">View Courses</a>
      </li>';
      echo ' <li class="nav-item">
        <a class="nav-link " href="../teacher/view_students.php">Calcualte CO</a>
      </li>';
      echo ' <li class="nav-item">
      <a class="nav-link " href="../teacher/co_po.php">CO/PO Mapping</a>
    </li>';
      }
      
      ?>
        <li class="nav-item">
        <a class="nav-link " href="/logic/logout.php">logout</a>
      </li>
        <?php } ?>
    </ul>
  </div>
  </div>
</nav>

