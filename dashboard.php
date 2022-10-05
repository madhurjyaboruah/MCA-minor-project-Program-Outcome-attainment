
<!doctype html>
<html>
<head>
<title>WELCOME ADMINISTRATOR</title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
 <link href="css/button.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link href="css/w3.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script src="jQueryAssets/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<style>
	body{
		font-family: 'Montserrat', sans-serif;
	}
	.title{
		background-image:url(images/tbg.jpg);
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
</style>
</head>
<body style="background-color:#ECECEC">


<?php include "admin-sidebar.php"; ?>



<div id="main" style="margin-left:230px;">
	<div class="container w3-card-4" style="background-color:darkblue">
        <div class="center-align " style="">
           <span style="background: darkblue;"><b><img src="images/logo.png." style="width: 5%; padding-top:5px"> <h3 style="font-family:roboto; color:white ; float: right;"> <b>CO/PO Attainmemt</b></h3></b></span>
        </div>
    </div>
    <div class="container" style="width:100%; margin:10px auto;">
        <span style=""; font-family:roboto; font-size:30px;color: black;">   
        <div class="w3-container w3-padding w3-card" style="background-color:">&nbsp;<i class="fa fa-dashboard"></i> &nbsp;Dashboard
        </div>

        </span>
    	<br>
    	<div class="w3-row-padding" style="font-family: 'Poppins', sans-serif;">
        	<div class="w3-quarter" >
            	<a href="views/program/index.php" style="text-decoration:none">
                <div class="container btn-hover color-1" style="color:white; padding:10px 20px 0px 20px;  height: 150px;">
                	<i class="fa fa-list xxxlarge" style="float: left;"></i><br>
                     <?php
                      require_once 'db/db_connection.php';
            $sql="Select count(*) from programe";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $n=$row[0];
            
          ?>
                     <span  style="float:right; font-size:50px; color:white;margin-top: -10%; font-family: 'Roboto', sans-serif"><strong><?php echo $n; ?></strong></span> <br>
                    <span style="float:right;margin-top:50px; font-size:20px">Registered Program</span>
                </div> 
                </a>
            </div>
            <div class="w3-quarter">
            	<a href="student_details.php" style="text-decoration:none">
                <div class="container  btn-hover color-4" style="color:white; padding:10px 20px 0px 20px;  height: 150px;">
                	<i class="fa fa-list xxxlarge" style="float: left;"></i><br>
                     <?php
                        
						$sql="Select count(*) from students";
						$result=mysqli_query($conn,$sql);
						$row=mysqli_fetch_array($result);
						$n=$row[0];
					?> 
                     <span  style="float:right; font-size:50px; color:white; margin-top:-10%; font-family: 'Roboto', sans-serif"><strong><?php echo $n; ?></strong></span><br>
                    <span style="float:right;margin-top:50px; font-size:18px">Registered Students</span> &nbsp;
                </div> 
                </a>
            </div>
            <div class="w3-quarter">
            	<a href="course_allot.php" style="text-decoration:none">
                <div class="container btn-hover color-7" style="color:white; padding:10px 20px 0px 20px;  height: 150px;">
                	<i class="fa fa-list xxxlarge" style="float: left;"></i><br>
                     
                     <span  style="float:right; font-size:50px; color:white; margin-top:-10%; font-family: 'Roboto', sans-serif"><strong>

                     <?php 
                           require_once 'db/db_connection.php';
                     	$r=mysqli_query($conn,"select count(*) from course");
                     	$rr=mysqli_fetch_array($r);
                     	 echo $rr['0']; ?> </strong></span><br>
                    <span style="float:right;margin-top:50px; font-size:18px">Registered Course</span> &nbsp;
                </div> 
                </a>
            </div>
            <div class="w3-quarter">
            	<a href="teacher_details.php" style="text-decoration:none">
                <div class="container btn-hover color-6" style="color:white; padding:10px 20px 0px 20px;  height: 150px;">
                	<i class="fa fa-list xxxlarge" style="float: left;"></i><br>
                     <!-- <?php
						$sql="Select count(*) from teacher";
						$result=mysqli_query($conn,$sql);
						$row=mysqli_fetch_array($result);
						$n=$row[0];
					?> -->
                     <span  style="float:right; font-size:50px; color:white; margin-top:-10%; font-family: 'Roboto', sans-serif"><strong><?php echo $n; ?></strong></span><br>
                    <span style="float:right;margin-top:50px; font-size:18px">Registered Professor</span> &nbsp;
                </div> 
                </a>
            </div>
                         
           </div><br>


           </div>
           
      
       
</div>   
<div id="id01" class="w3-modal" style="z-index:9999;">
    <div class="w3-modal-content w3-animate-top" style="width:80%;">
        <div class="w3-card-4 w3-white w3-opacity-min" style="margin-top:24px;">
            <span onclick="closemodal();" class="w3-button w3-display-topright w3-xlarge">&times;</span>
            <div class="w3-container w3-center" style="padding-top:16px;">
                <h4 class="w3-border-bottom">Order Details</h4>
            </div>
            <div class="w3-container w3-small" id="vs" style="padding-bottom:32px;">
                
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript"> 
  function closemodal()
    {
        document.getElementById('id01').style.display='none';
    }
    function openmodal(invno)
    {
        document.getElementById('id01').style.display='block';
         $("#vs").html("");

            $.ajax({

                url: "getinvoicedetails.php",
                type: "POST",
                data: {
                  "invno" : invno,
                },
                success:function(resp){
                  $("#vs").html(resp);
                },
                error:function(resp){
                  alert(resp);
                },

            });

    }
</script>
<script>
        $(document).ready(function(){
          $('#myTable').DataTable(
 {
    "order": [[ 0, 'desc' ]]
           } 
            );
          
        });

</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php




?>
