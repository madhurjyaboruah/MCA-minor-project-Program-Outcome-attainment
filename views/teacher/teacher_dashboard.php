<?php
include "../../views/global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'teacher') {
    header("Location:/views/dashboard.php");
    exit();
  }
}else{
  header("Location:/views/auth/login.php");
}
?>
<br><br>
<div class="container">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
     
        <p class="card-text">view Assigned Course</p>
        <a href="#" class="btn btn-primary">Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text">view Registered Student</p>
        <a href="#" class="btn btn-primary">Go</a>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
    
        <p class="card-text">view Assigned Course</p>
        <a href="#" class="btn btn-primary">GO</a>
      </div>
    </div>
  </div>

</div>
