<?php session_start();

include("mainheader.php");

// include class
include('dogfairclasses.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// validate login form
		$errors = array();
		if (empty($_POST['username'])) {
			$errors[] = "Username field id required";
		}
		if (empty($_POST['password'])) {
			$errors[] = "Password field id required";
		}

		if(empty($_POST['username'] || $_POST['password'])){
		echo "Username and password are both required to login";
		}
		else{
			// create instance of Users class
			$objuser = new Users;

			$result = $objuser->adminlogin($_POST['username'], $_POST['password']);

			// create session variables
		 		$_SESSION['username'] = $result['username'];
		 		$_SESSION['email'] = $result['email_address'];

			if ($result) {
			$message = "<div class='alert alert-success'>Successfully Logged in!</div>";
			// redirect to dashboard
	        header("Location: http://localhost/dogfair/admindashboard.php");
	        exit();
		}
		else{
			$message = "<div class='alert alert-danger'>Sorry, Invalid cridentials!</div>";
		}

		}
	

	}

 ?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ADMIN | Login Area</title>
	</head>
	<body>
		<div class="container offset-3" style="margin-top: 150px;">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="POST">
						<?php 

						if (!empty($errors)) {
							echo "<ul class='alert alert-danger'>";
							foreach ($errors as $key => $value) {
								echo "<li>$value</li>";
							}
							echo "</ul>";
							}
							if (!empty($message)) {
							echo $message;
							}


						?>
						<h4 class="my-4 text-success">ADMIN LOGIN AREA</h4>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" name="username" class="form-control">
						</div>

						<div class="form-group">
							<label>Password:</label>
							<input type="password" name="password" class="form-control">
						</div>

						<input type="submit" name="submit" value="LOGIN" class="btn btn-block btn-success">

					</form>
				</div>
			</div>
		</div>
	</body>
</html>


<?php
include("mainfooter.php");

?>