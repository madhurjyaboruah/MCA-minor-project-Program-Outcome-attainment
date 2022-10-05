<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>course registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">PO attainment System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Student Login</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
   <br>
    
  <section class="container-fluid">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-3 col-md-6">
              <center><h3>Course Registration Form</h3></center>
			<form action="/logic/course_store.php" method="post">
				<div class="form-group">
					<label for="name">Course Name:</label>
					<input type="text" name="course_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Course Code:</label>
					<input type="text" name="course_code" class="form-control" required>
                </div>
               
                <div class="form-group">
								<label for="course instructor">course instructor:</label>
								<select class="form-control" name="teacher_id" id="gender">
                                    
                                         <?php 
                                         require_once '/db/db_connection.php';
                                         $sql ="SELECT * FROM teacher";
                                         $res = mysqli_query($conn,$sql);
                                         while($row = $res->fetch_assoc()){
                                             $professor = $row['teacher_name'];
                                             echo "<option value=".$row['id'].">".$professor."</option>";
                                         }
			

                                        ?>
									

                                </select>
                </div>
				<button type="submit" name="resigter" class="btn btn-primary">register</button>
			</form>

     </section>  
    </section>
  </section>


</body>
</html>