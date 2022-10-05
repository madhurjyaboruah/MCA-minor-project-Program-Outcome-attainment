<?php
include "../../db/db_connection.php";
include "../global/header.php";
if (isset($_SESSION['ID'])) {
  if($_SESSION['ROLE'] != 'teacher') {
    header("Location:/views/dashboard.php");
   
  }
}else{
  header("Location:/views/auth/login.php");
}
?>
<?php
if ($_POST) {
	//var_dump($_POST);
	$cid = $_POST['cid'];
    $sid = $_POST["sid"];
    var_dump($sid);
    $sql = "select * from test_details where course_id='$cid'";
    $res = mysqli_query($conn,$sql);
}
    while($row1 = mysqli_fetch_assoc($res)){
      ?> 
      <table>
      <td>
      <form class="form-inline" action="/views/student/testfinal_co.php" method="POST" >
      <input type="hidden" name="cid" value="<?php $cid;?>" >
      <input type="hidden" name="sid" value="<?php $sid;?>" >
      <input type="hidden" name="tid" value="<?php echo $row1['id'];?>" >
     <button type="submit">Test</button>
    </form>


      </td>
  
        </table>
    
      
      <?php }?>
  