<?php
include 'lib/nusoap.php'; //include file for nusoap client functions
include 'db_connection.php'; //include file for database connection test

$client = new nusoap_client("http://localhost/dows-soap/service.php?wsdl"); // create a instance for nusoap client

//pass admission number to nusoap client which calls the fetch details function 'fetch'
if(isset($_POST["search"])){
    $admNo = trim($_POST["adm_no"]);

	$response = $client->call('fetch',array("admNo"=>$admNo));
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
        <title>Search Student Details</title>
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
            <!-- search form -->
                <div class="panel-heading">
                    Search A Student Using Details
                    <a class = "link" href="register_student.php">Register A New Student</a>
                </div>
                    <div class="panel-body">
                        <form method="post" name="search_form">
                            <div class="form-group">
                                <label>Enter Admission Number to search student</label>
                                <input type="text" name="adm_no" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="search" class="btn btn-success" value="Search" />
                            </div>
                            <div class="form-group">
                              <?php global $response; echo $response; ?> <!-- display success/error message for returning student information -->
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
  $("form[name='search_form']").validate({
    rules: {
        adm_no:{
            required:true,
            number:true,
        }
    },
    messages: {
        adm_no: "Please enter a valid admission number."
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
