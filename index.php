<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin - Login</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
  



     <style>
	input{
		border-radius: 10px !important;
		
	}
    
    
</style>

<body style="background: white; " >
	<div class="container-fluid">

    
							
						

<!--linear-gradient(to bottom left, white , blue)--> 
		<div class="row no-gutters" style="outline: black; background: white; border-radius: 20px; color: black; margin-top: 10%; margin-bottom:10; margin-left: 20%; margin-right: 20%; box-shadow: 12px 12px 22px gray;">


			<div class="col-md-6" id="student" >
				<form action="logic/login.php" method="post">
                    
				    
						
						<div class="card-body" style="padding: 10%; background: #ADD8E6; color: black; border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
							
							<div class="form-group" >
								<label for="name">Sign in</label>
								
							</div>
							<br>
							
							<div class="form-group" >
								<label for="name">USER NAME:</label>
								<input type="text" name="user_name" class="form-control" required>
							</div>

                            <div class="form-group" >
								<label for="name">PASSWORD:</label>
								<input type="password" name="password" class="form-control"  required>
							
							</div>
							<input type="submit" name="submit" class="btn btn-primary"></input>

                            
                            
                        
							
						</div>
					
				</form>
			</div>

			<div class="col-md-6" id="student" >
				<form action="login.php" method="post" >
                    
				 <div style="padding-top: 70px; padding-left: 10px; padding-right: 10px;"> 
						
				 	<center><img src="images/logo.png" ></center><br>
					<center><h3>PO/CO ATTAINMENT SYSTEM</h3></center>
								
				 </div>
				</form>
			</div>


			
		</div>
	
</div>
	
</body>


      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   </body>
</html>