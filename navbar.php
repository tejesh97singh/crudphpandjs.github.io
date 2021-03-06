<?php
// Initialize the session
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
exit;}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>  
<body>   

<!-- As a link -->
<nav class="navbar navbar-dark primary-color">
  <a class="btn btn-secondary" href="dashboard.php">Home</a>
  <a class="btn btn-secondary float-right" href="#"><?php
	if($_SESSION['loggedin']==true){ 
       echo "Welcome, "; 
	   echo $_SESSION["username"];
        }
?></a>
  <a class="btn btn-secondary" href="logout.php">Logout</a>
</nav>

<br>

</body>
</html>
