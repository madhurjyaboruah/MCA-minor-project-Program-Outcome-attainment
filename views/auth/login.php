<?php
//include "../global/header.php";
?>
  <link rel="stylesheet" href="/resources/css/bootstrap.min.css"> 
<style>
	input{
		border-radius: 10px !important;
	}

    .card-body{
        outline: none !important;
        background: white;
        border-radius: 20px;
    }

    .card-header{
        outline: none !important;
        background: white;
        border-radius: 20px;
    }

    form{
        border-radius: 20px;
    }
    #student{
        background: transparent;
    }
</style>


<body style="background: linear-gradient(to bottom right, #ffffff , #000000);">
	<div class="container-fluid">

    <div class="card-header" style="background: white; border-radius: 20px; outline: none; color: white;" >
							
						


		<div class="row justify-content-center" style="padding: 4%;">

			<div class="col-md-6" id="student" >
				<form action="/../../logic/login.php" method="post">
                    
				    <div class="card" style="border-radius: 20px; outline: none; color: black;" >
						<div class="card-header" >
							<h4 class="card-title" style="padding:1em;">Log In </h4>
						</div>
						<div class="card-body" style="padding: 10%;">
							<div class="form-group" >
								<label for="name">USER NAME:</label>
								<input type="text" name="user_name" class="form-control" required>
							</div>

                            <div class="form-group" >
								<label for="name">PASSWORD:</label>
								<input type="text" name="password" class="form-control"  required>
							</div>

                            <div>
                            <label for="name">Forget Password</label>
                            </div>
                            <br>
                            <Center><input type="submit"  name="submit" class="btn btn-primary" style="width: 10em"></button></Center>
							
						</div>
					</div>
				</form>
			</div>

           
			
		</div>
	</div>
</div>
	
</body>



</html>