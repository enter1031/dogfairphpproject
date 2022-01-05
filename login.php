<?php session_start();
include("mainheader.php");


include('dogfairclasses.php');
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	if (empty($_POST['email'])) {
		$errors[] = "Email field id required";
	}
	if (empty($_POST['password'])) {
		$errors[] = "Password field id required";
	}
	
	else{

		// instantiate the class
		$users = new Users;
		$result = $users->login($_POST['email'], $_POST['password']);

			// // create session variables
			$_SESSION['userid'] = $result['users_id'];
			$_SESSION['fullname'] = $result['fullname'];
			$_SESSION['email'] = $result['email_address'];
			$_SESSION['phone'] = $result['phone_no'];
			$_SESSION['profilepix'] = $result['profile_pix'];
			$_SESSION['profilename'] = $result['profile_name'];
			$_SESSION['address'] = $result['address'];
			$_SESSION['breedname'] = $result['breed_name'];
			$_SESSION['cart'] = $result['cart'];


			// if ('$password' != $_POST['password']) {
			// $errors[] = "Incorrect password, please enter a correct password";
			// }

			if ($result) {
				$message = "<div class='alert alert-success'>Successfully Logged in!</div>";
				header("Location: index.php");
				exit();
			}
			else{
			$message = "<div class='alert alert-danger'>Sorry, Invalid cridentials!</div>";
		}
	}

			// if (!isset($_SESSION['email'])) {
			// 	include "mainheader";
			// }
			// else{
			// 	include "userdashboardheader.php";
			// 	exit;
			// }	

}
		

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div class="container" style="margin-top: 150px;">
		<div class="col-md-6 offset-0">
				<?php
				// if (empty($result)) {
				// 	echo $error;
				// }


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
			<form action="" method="POST">
		
				<h4 class="my-4 text-success">Login</h4>
				<div class="form-group">
					<input type="email" name="email" placeholder="Email Address" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" id="pass1" class="form-control" required>
					<input type="checkbox" name="checkbox" id="pwdshow" onclick="passchange1()"> <small>show password</small>
					<!-- <img src="images/eye_off_icon.png" id="loginslash1" onclick="passchange1()"> -->
				</div>
				<input type="checkbox" name="checkbox"> Remember me &nbsp;&nbsp;&nbsp; <span class="text-success"><a href="forgotpassword.php" class="text-success"> Forgot your password?</a></span>
				<br>
				<br>
				<input type="submit" name="login" value="LOGIN" class="form-control btn btn-success">
			</form>
		</div>
	</div>

	
<script type="text/javascript">

		function passchange1() {
			var pwd = document.getElementById("pass1");
			if (pwd.type === "password") {
				pwd.type = "text";
			}
			else{
				pwd.type = "password";
			}
		}


	</script>
</body>
</html>

<?php
include("mainfooter.php");

?>