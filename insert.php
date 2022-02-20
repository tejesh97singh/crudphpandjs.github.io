<?php

// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
exit;}
// Include config file
include_once 'connection.php';
include_once 'navbar.php';
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["c_name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["user_address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["user_salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (firstname, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: dashboard.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	
    <title> Add Employees</title>
 
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="js/insert.js"></script>
	<script src="js/insert.js"></script>
    <style type="text/css">
    .wrapper{
     width: 500px;
     margin: 0.5vw auto;
    }
	.align{
			
	margin-top : 0.5vw;
	margin-bottom : 0.8vw;
	}
	.err { background: #ffe6ee; border: 1px solid #b1395f; }
	.emsg { color: #c12020; font-weight: bold; }
		
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <nav class="navbar navbar-light blue lighten-4 align">
							  <span class="navbar-brand text-center font-weight-bold">Add Employees</span>
							</nav>
                    </div>
                   
                   <form action="" method="post" onsubmit="return check()" novalidate >
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="c_name" id="c_name"  onblur="check();"  required minlength="3" maxlength="20" class="form-control"  />
							<div id="error_cname" class="emsg"></div> <br>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="user_address" id="user_address" onblur="check();"  required minlength="3"   maxlength="30" class="form-control" />
							<div id="error_user_address" class="emsg"></div> <br>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="Text" name="user_salary" id="user_salary" onblur="check();" required minlength="1"   class="form-control" />
							  <div id="error_user_salary" class="emsg"></div> <br>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="Submit"  />
						<p><a href="dashboard.php" class="btn btn-primary">Back</a></p>
                    </form>
                </div>
            </div>        
        </div>
    </div>

</body>
</html>