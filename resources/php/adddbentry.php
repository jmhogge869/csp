<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thank-you!</title>
<link href="../css/reset.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116411141-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116411141-1');
</script>

	</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
  $user_name = $_POST['name'];
  $user_title = $_POST['title'];
  $user_mail = $_POST['email'];
  $phone_number = $_POST['number'];
  $company_name = $_POST['org'];
//database connect to database

 $dbhost = "localhost";
 $dbuser = "jmhogge1";
 $dbpass = "Parker869@";
 $db = "iotleads";
 
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die('Error Connecting to DB');
 
$sql = "INSERT INTO leads2 (email, name, org, phone, title)
VALUES ('$user_mail', '$user_name', '$company_name', '$phone_number', '$user_title')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	

	
//text file handling	
	


 // echo($user_name);
 // echo($user_mail);
 // echo($phone_number);
 // echo($company_name);
$my_file = 'leads.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle, $user_name);
fwrite($handle, "\n");
fwrite($handle, $user_title);
fwrite($handle, "\n");
fwrite($handle, $user_mail);
fwrite($handle, "\n");
fwrite($handle, $company_name);
fwrite($handle, "\n");
fwrite($handle, $phone_number);
fwrite($handle, "\n");
fclose($handle);
?>
	
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
	<img src="../images/logo.png" alt="lvs logo">
	</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://www.longviewsystems.com">longviewsystems.com <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://www.longviewsystems.com">Visit Long View</a>
          <a class="dropdown-item" href="https://www.microsoft.com/en-us/internet-of-things">Visit Microsoft Internet of Things</a>
        </div>
      </li>
  
    </ul>

  </div>
</nav>

<!-- single column -->

<div class="row">
	<div class="col-lg-9">
	<p id="headline">Thanks for your interest!  A member of our team will reach out shortly.</p>
	  <p id="copy">In the meantime if you have any questions, give us a call at 1.866.515.6900 </span>.</p>	
	</div>
</div>
</html>