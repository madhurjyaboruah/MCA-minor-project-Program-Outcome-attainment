<?php
include "../../db/db_connection.php";
include "../global/header.php";
if (isset($_SESSION['ID'])) {
  if ($_SESSION['ROLE'] != 'teacher') {
    header("Location:/views/dashboard.php");
  }
} else {
  header("Location:../../index.php");
}

?><br>
<center><h3>CO Attainment Ruberics For Student CSM19032</h3> </center>
<center><h3>Course Name: DBMS</h3> </center>
<?php
if ($_POST) {
  //var_dump($_POST);
  $cid = $_POST['cid'];
  $sid = $_POST["sid"];
  $tid = $_POST["test_id"];
 // var_dump($_POST);
  $col_count = 0;
  $i = 0;
  $co_array = [];
  $row_count = 0;
}

?>

<div class="container">
  <div class="row">
    <div class="col">
      <table class="table" id="table">
        <thead>
          <tr>

            <th scope="col">Question Details
            
            </th>
            <?php $sql = "select * from course_outcome where course_id='$cid'";
            $res = mysqli_query($conn, $sql);

            while ($row1 = mysqli_fetch_assoc($res)) {
              echo "<th>" . $row1["co_title"] . " </th>";
              $co_array[$col_count] = $row1["id"];
              $col_count++;
            }

            // echo $co_array[0];
            // echo $co_array[1];
            // echo $co_array[2];
            // echo $co_array[3];
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "select * from test_element where course_id='$cid' and test_id='$tid'";
          $res = mysqli_query($conn, $sql);

          while ($row2 = mysqli_fetch_assoc($res)) { ?>
            <tr>
              <td> <?php echo $row2["qus_number"] . " " . $row2["total_marks"] . " " . $row2["waitage"] . " " ; ?>
                <?php $sql3 = "select * from question_co where question_id='" . $row2["id"] . "'";
                $res3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($res3)) {
                  echo " " . $row3["co_title"] . "  ";
                  //$col_count++;
                } ?>

              </td>
              <?php while ($i < $col_count) { ?>
                <td>
                  <select class="custom-select"  id="<?php echo $co_array[$i]; ?>[]">
                    <option selected>Select proper CO value </option>
                    <option value="1">0</option>
                    <option value="2">1</option>
                    <option value="-1">N/A</option>
                  </select>
                </td>
              <?php $i++;
                // echo $co_array[$i];
              }
              $i = 0;
              //  echo $co_array;
              ?>
            </tr>

          <?php    }


          ?>
          
          <tr id="score">
             
            
          </tr>
        </tbody>
      </table>
      
      <form method="POST" action="../../logic/student_co.php">
         <input type="hidden" name="cid" value="<?php echo $cid;?>" >
         <input type="hidden" name="sid" value="<?php echo $sid;?>" >
         <input type="hidden" name="tid" value="<?php echo $tid;?>" >
                                   
        <div id="val" style="margin-bottom: 10px;">
        </div>
      </form>
    </div>
  </div>
  <button onclick="cal()" style="margin-bottom: 10px;">Calculate values</button>
    <div id="print" style="margin-bottom: 10px;">
    </div>

</div>

<script>
  function cal() {
    document.getElementById("score").innerHTML = "";
    document.getElementById("score").innerHTML += "<td> Scores </td>";
    var i = 0;
    var j = 0;
    var total_cols = <?php echo $col_count; ?>;
    console.log(total_cols);
 
    // var sumVal = [[],[]];
    var sumVal = [];
    var percentage = [];
    // for(let i=0;i<table.rows.length;i++){
    //   for(let j=0;j<total_cols;j++){
    //     sumVal[i]=[];
    //   }
    // }
    var z=1;
    var psum=0;
    var table = document.getElementById("table");
    console.log(table.rows.length);
            for(var i = 1; i < table.rows.length; i++)
            {
              var count=0;
                 var c=0;
                for(j=1; j<=total_cols;j ++){
                  var some = table.rows[j].cells[i].getElementsByTagName('select')[0];
                  // c = c+ table.rows[i].cells[j].getElementsByTagName('select')[0];
                  var actual_value = some.options[some.selectedIndex].value;
                  if(parseInt(actual_value)==-1){
                    continue;
                  }
                  // console.log(some);
                  // console.log(parseInt(actual_value)-1);
                  // c=c+actual_value;
                  // console.log(parseInt(actual_value)-1);
                  c = c + parseInt(actual_value)-1;
                  count=count+1;
                  // sumVal[i] = sumVal[i] + parseInt(actual_value)-1;
                  // sumVal[j] = sumVal + actual_value;
              }
              sumVal[z] =  c;
              percentage[z] =  c/count*100;
                // console.log(c);
                console.log(sumVal[z]+" "+percentage[z]);
                // console.log(sumVal[z]);
                psum=psum+percentage[z];
                document.getElementById("score").innerHTML += "<td>CO Attainment = " + percentage[z] + "%</td>";                
               z=z+1;
                if(i+2 == table.rows.length){
                  document.getElementById("val").innerHTML = "<input type='hidden' name='co_avg' value="+ parseInt(psum)/parseInt(total_cols) +"/>";                
                  document.getElementById("val").innerHTML += "<input type='submit' value='Submit CO values'/>";                
                  document.getElementById("print").innerHTML = "<input type='button' value='Print this page' onClick='window.print()'>"
          }

            }
            // document.getElementById("val").innerHTML += "<input type='hidden' value="+ parseInt(psum)/parseInt(total_cols) +"/>";                
            // document.getElementById("val").innerHTML += "<input type='submit' value='Submit CO values'/>";                
          //  console.log(parseInt(psum)/parseInt(total_cols));
          //  document.getElementById("print").innerHTML = "<input type='button' value='Print this page' onClick='window.print()'>";                
              // document.getElementById("print").style.display="block !important";
            // document.getElementById("val").innerHTML = "Sum Value = " + sumVal;
            //  console.log(sumVal[1]);
            
            // console.log(table.rows[1].cells[2].getElementsByTagName('select'));
            
          //  console.log();
  }
</script>