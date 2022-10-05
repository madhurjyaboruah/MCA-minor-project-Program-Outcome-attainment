<?php session_start();
     if(! isset($_SESSION['ID'])){ 
       header("Location:index.php");}
?>
<!doctype html>
<html>
<head>
<title>Student List</title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
 <link href="css/button.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link href="../../css/w3.`css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script src="jQueryAssets/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<style>
	body{
		font-family: 'Montserrat', sans-serif;
	}
	.title{
		background-image:url(images/school.png);
		background-repeat:repeat-x;
	}
	label.error{
			color:#F00;	
			font-size:x-small;
	}
	.menu{
		background-image:url(images/mbg.jpg);
		background-repeat:repeat-x;
	}
	.cute{
		font-family: 'Cute Font', cursive;
	}
	.sbg{
		background-image:url(images/sg.jpg);
		background-position:left;
		background-repeat:no-repeat;
		padding-left:55px;
	}
	.r1{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
	.r2{
		border-top-right-radius:20px;
		border-bottom-right-radius:20px;
	}
	.menu-icon{
		width:40px;
	} 
	   .multipleSelection {
		   width: 300px;
		   background-color: #BCC2C1;
	   }
 
	   .selectBox {
		   position: relative;
	   }
 
	   .selectBox select {
		   width: 100%;
		   font-weight: bold;
	   }
 
	   .overSelect {
		   position: absolute;
		   left: 0;
		   right: 0;
		   top: 0;
		   bottom: 0;
	   }
 
	   #checkBoxes {
		   display: none;
		   border: 1px #8DF5E4 solid;
	   }
 
	   #checkBoxes label {
		   display: block;
	   }
 
	   #checkBoxes label:hover {
		   background-color: #4F615E;
	   }
   
</style>
</head>
<body style="background-color:#ECECEC">


<?php include "admin-sidebar.php"; ?>



	<div id="main" style="margin-left:230px;">
	<div class="container w3-card-4" style="background-color:darkblue">
	<div class="center-align " style="">
		<span style="background: darkblue;"><b><img src="images/logo.png" style="width: 5%; padding-top:5px"> <h3 style="font-family:roboto; color:white ; float: right;"> <b>PO/CO attainment</b></h3></b></span>
	</div>
	</div>
	<div class="" style="width:100%; margin:10px auto;"><div class="w3-container w3-margin-bottom" >

	<div class=" w3-padding">
	<center><div class="" style="width:1200px; height:600px; margin-top:1%; overflow:scroll;">
	<h3 style="color:grey; font-weight:bold">Student List</h3><br>
	<div class="" style="width:98%;" >
	<table id="myTable" class="w3-table-all">
	<thead>
	<tr style="background-color: mediumseagreen; color:white;">


	<th>Program Name</th>
	<th>Student Name</th>
	<th>Roll No</th>
	<th>Seasion</th>
	<th>Select Course</th>
	<th>Action</th>




	</tr>
	</thead>
<?php
include ("db/db_connection.php");
$sql="select * from students";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result))
{
?>  
<tr>

<form method="post" action="course_allot_back.php">
<td><?php echo $row["program_id"]; ?></td>
<td><?php echo $row["student_name"]; ?></td>
<td><?php echo $row["roll"]; ?></td>
<td><?php echo $row["startyear"]; ?></td>
<td>


<div class="multipleSelection">
	<div class="selectBox" 
		onclick="showCheckboxes()">
		<select>
			<option>Select course</option>
		</select>
		<div class="overSelect"></div>
	</div>

	<div id="checkBox">
			<?php
			    $pid =  $row["program_id"];
				$roll = $row["roll"];
				$sql ="SELECT * FROM course where program_id='$pid'";
				$sql2 = "SELECT course_id FROM  course_student where student_id='$roll'";
				$res = mysqli_query($conn,$sql);
				$res2 = mysqli_query($conn,$sql2);
				
				$res = $res->fetch_all();
				$res2 = $res2->fetch_all();
				//var_dump($res);
		
			

				  foreach($res as $key =>  $value){?>
			
		 <?php echo $value[3];?> <input type="checkbox" name="cid[]" value="<?php echo $value[0];?>"> <br>
	    <?php } ?>
		
	
		</div>
</div>


</td>
<input type="hidden" id="" name="sid" value="<?php echo $row["id"]; ?>" >
<td><input type="submit" name="submit" value="click"></td>

</form>



</tr>

<?php
   }  
   ?>
     
</table>
</div>

</div>
  </div>
      </div>

</html>
<script>
        $(document).ready(function(){
          $('#myTable').DataTable(
 {
    "order": [[ 0, 'desc' ]]
           } 
            );
          
        });

</script>
<?php
  if(isset($_GET["save"]))
  {
    echo  
  '

  <script>alert("Book Added");</script>


  ';  
  }
?>
