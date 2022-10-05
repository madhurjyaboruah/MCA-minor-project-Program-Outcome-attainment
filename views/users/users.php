<?php
include "../global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'admin') {
    header("Location:/views/dashboard.php");
    exit();
  }
}else{
  header("Location:/views/auth/login.php");
}
include "../../db/db_connection.php";
?>
<style>
	input{
		border-radius: 10px !important;
	}

	select{
		border-radius: 10px !important;
	}

</style>

<body style="background: linear-gradient(to bottom right, #ffffff , #000000);">
	<div class="container-fluid">

		<div class="row justify-content-center" style="padding: 4%;">
			<div class="col-12 col-sm-3 col-md-6" id="student">
				<form action="../../../logic/user1.php" method="post">
				<div class="card" style="border-radius: 50px; color: black;" >
						<div class="card-header">
							<h4 class="card-title" style="padding:1em;">Student Register Form </h4>
						</div>
						<div class="card-body" style="padding: 6%;">
							<div class="form-group">
								<label for="name">USER NAME:</label>
								<input type="text" name="user_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="name">E-MAIL:</label>
								<input type="text" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="Department">PASSWORD:</label>
								<input type="text" name="password" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="hidden" name="role" value="student">
							</div>
							<div class="form-group">
								<label for="name">STUDENT NAME:</label>
								<input type="text" name="student_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="course instructor">Select Programme:</label>
								<select class="form-control" name="program_id" id="gender">
                                    
                                         <?php 
                                        
                                         $sql ="SELECT * FROM programe";
                                         $res = mysqli_query($conn,$sql);
                                         while($row = $res->fetch_assoc()){
                                             $professor = $row['program_name'];
                                             echo "<option value=".$row['program_id'].">".$professor."</option>";
                                         }
			

                                        ?>
									

                                </select>
                </div>
							<div class="form-group">
								<label for="name">STUDENT ROLL. NO:</label>
								<input type="text" name="roll" class="form-control" required>
							</div>

							

							<div class="form-group">
								<label for="Department">DATE OF BIRTH:</label>
								<input type="date" name="dob" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="GENDER">GENDER:</label>
								<select class="form-control" name="gender" id="gender">
									<option>--SELECT--</option>
									<option>Male</option>
									<option>Female</option>
									<option>Other</option>

								</select>
							</div>

							<div class="form-group">
								<label for="Department">PROGRAM NAME:</label>
								<input type="text" name="program_name" class="form-control" required>
							</div>

                            <div class="form-group">
							<select class="form-control" name="starting_year">
								<option selected>Enrolled year</option>
								<?php 
								$i =1995;
								while($i<=date("Y")){
									echo '<option value="'.$i.'">'.$i.'</option>'  ;
									$i++;
								}
								?>
								</select>
							</div>
							<div class="form-group">

							  <select class="form-control" name="end_year">
								<option selected>End year</option>
								<?php 
								$i =1995;
								while($i<=date("Y")){
									echo '<option value="'.$i.'">'.$i.'</option>'  ;
									$i++;
								}
								?>
								</select>
							</div>
					

							<div class="form-group">
								<label for="Department">MOBILE NO:</label>
								<input type="text" name="mobile" class="form-control" required>
							</div>
							<div class="text-center">
								<button type="submit" name="submit" id="submit1" class="btn btn-primary">Create</button>
								<a href="dashboard22.php" id="back1" class="btn btn-danger btn-md">Back</a>
							</div>

						</div>
					</div>
					</form>
			</div>
			
			<div class="col-12 col-sm-3 col-md-6" id="teacher">
			<form action="../../../logic/user1.php" method="post">
			<div class="card" style="border-radius: 50px;" >
					<div class="card-header">
						<h4 class="card-title" style="padding:1em;">Teacher Register Form </h4>
					</div>
					<div class="card-body" style="padding: 6%;">
						<div class="form-group">
							<label for="name">USER NAME:</label>
							<input type="text" name="user_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name">E-MAIL:</label>
							<input type="text" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="Department">PASSWORD:</label>
							<input type="text" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="role" value="teacher">
						</div>

							<div class="form-group">
								<label for="name">TEACHER NAME:</label>
								<input type="text" name="teacher_name" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="Department">TEACHER DESIGNATION:</label>
								<input type="text" name="desig" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="Department">DATE OF BIRTH:</label>
								<input type="date" name="dob" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="GENDER">GENDER:</label>
								<select class="form-control" name="gender" id="gender">
									<option>--SELECT--</option>
									<option>Male</option>
									<option>Female</option>
									<option>Other</option>

								</select>
							</div>

							<div class="form-group">
								<label for="Department">MOBILE NO:</label>
								<input type="text" name="mobile" class="form-control" required>
							</div>
							<div class="text-center">
								<button type="submit" name="submit" id="submit1" class="btn btn-primary">Create</button>
								<a href="dashboard22.php" id="back1" class="btn btn-danger btn-md">Back</a>
							</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col">

	</div>
	</div>
	</div>





</body>


</html>