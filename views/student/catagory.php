<?php
include "../../db/db_connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card mt-5">
                        <div class="card-header">
                            Category Subcategory Dropdown in PHP MySQL Ajax
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="CATEGORY-DROPDOWN">Category</label>
                                    <select class="form-control" id="category-dropdown">
                                        <option value="">Select Category</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM programe ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['program_id']; ?>"><?php echo $row["program_name"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="SUBCATEGORY">Sub Category</label>
                                    <select class="form-control" id="sub-category-dropdown">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#category-dropdown').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "/views/student/subcatagory.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(result) {
                            $("#sub-category-dropdown").html(result);
                        }
                    });
                });
            });
        </script>
    </body>
</html>