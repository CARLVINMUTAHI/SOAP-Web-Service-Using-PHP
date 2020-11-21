<?php
include 'db_connection.php'; //include file with database connections and operations

//pass form values to register students function - remove whitespaces before saving in db
if(isset($_POST["register"])){
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $dob = trim($_POST["dob"]);
    $school = trim($_POST["school"]);
    $course = trim($_POST["course"]);

    register($first_name, $last_name, $dob, $school, $course);
}
?>

<!-- form styling - focus on text box and error highlighting -->
<style>
.link{
    float: right;
    color: green;
}
.form-control:focus {
    border-color: #000;
    box-shadow: none;
}
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}
.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}
</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register Students</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css"
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    </head>
    <body>
        <div class="container">
        <span class="text-info"><?php echo $conn_msg; ?></span> <!-- display success/error database connection message -->
            <div class="panel panel-default">
            <!-- registration form -->
                <div class="panel-heading">
                    Student Registration
                    <a class = "link" href="client_consumption.php">Search Student Details</a>
                </div>
                    <div class="panel-body">
                        <form method="post" name="reg_form">
                            <div class="form-group">
                                <label>Student First Name</label>
                                <input type="text" name="first_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Student Last Name</label>
                                <input type="text" name="last_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>School</label>
                                <select name = "school" class="form-control">
                                    <option value = ''>Select School</option>
                                    <option value = "SCES">SCES</option>
                                    <option value = "SIMS">SIMS</option>
                                    <option value = "SLS">SLS</option>
                                    <option value = "SBS">SBS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <select name = "course" class="form-control">
                                    <option value = ''>Select Course</option>
                                    <option value = "BICS">BICS</option>
                                    <option value = "BFE">BFE</option>
                                    <option value = "LLB">LLB</option>
                                    <option value = "BCOM">BCOM</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <input type ="submit" name="register" class="btn btn-primary" value="Register"/>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </body>
</html>

<!-- form validation script -->
<script>
$(function() {
  $("form[name='reg_form']").validate({
    rules: {
        first_name: "required",
        last_name: "required",
        dob: "required",
        school:"required",
        course:"required"
    },
    messages: {
        first_name: "Please enter the first name",
        last_name: "Please enter the last name",
        dob: "Please enter the date of birth",
        school: "Please enter the school",
        course: "Please enter the course"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
