<?php
include "../../db/db_connection.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($conn, "SELECT * FROM course  where program_id = $category_id");
?>
<option value="">Select Sub Category</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["course_id"]; ?>"><?php echo $row["course_name"]; ?></option>
    <?php
}
?>