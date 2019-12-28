<?php
session_start();
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
 header("Location:index.php");   
}
require "./Class/connection.class.php";
require "Class/database.class.php";
$database = new Database;

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
   if($database->loginUser($username,$password))
   {}
   else{
	$error = "105";
   } 
  }
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="CSS/main.css"><!--Main CSS-->
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet"><!--Google fonts-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Social icons-->
</head>
<body>
<div id="wrapper">
<div id='menuWrapper'>    
    </div>
	<div id="mainWrapper">
		<main id="mainRegister">
			<div id="formWrapper">
				<h2>LOGIN</h2>
				<form action="login.php" method="POST">
				  <div class="form-row">
				    <div class="col">
				      <input type="text" name="username" class="form-control" placeholder="Username..." required autofocus>
				    </div>
				    <div class="col">
				      <input type="password" name="password" class="form-control" placeholder="Password..." required>
				    </div>
                  </div>
				  <?php
				  if(!empty($error)){
					  if($error == "105"){
						 echo '<div class="alert-danger">
						 Wrong details!
					   </div>';
					 } 
				  }
				  ?>
                    <br/>
				  <div id="buttonSubmit">  
				  	<button type="submit" name="submit" class="btn"><strong>LOGIN</strong></button>
				  </div>
				</form>
			</div>
		</main>
	</div>
</div>
</body>
</html>
