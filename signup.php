<?php session_start();

include("mainheader.php");

// include class
include('dogfairclasses.php');

if (!empty($_POST)) {
	
	$errors = array();
	if (empty($_POST['fullname'])) {
	$errors[] = "Fullname field is required";
	}
	if (empty($_POST['email'])) {
	$errors[] = "Email field is required";
	}
	if (empty($_POST['phone_no'])) {
	$errors[] = "Phone number field is required";
	}
	if (empty($_POST['address'])) {
	$errors[] = "Address field is required";
	}
	if (empty($_POST['password'])) {
	$errors[] = "Password field is required";
	}
	if (empty($_POST['checkbox'])) {
	$errors[] = "Checkbox field is required";
	}


	// check if all credentials are supplied
	// if (empty($_POST['fullname'] || $_POST['email'] || $_POST['phone_no'] || $_POST['address'] || $_POST['password'])) {
	// 	$message = "<div class='alert alert-danger'>Please supply all the necessary credentials</div>";
	// }

	if (strlen($_POST['password']) < 6) {
			$passerror = "Password must be up to 6 characters";
		}

		if (strlen($_POST['confirm_password']) < 6) {
			$passerror = "Password must be up to 6 characters";
		}

		if ($_POST['password'] !== $_POST['confirm_password']) {
			$passerror = "Password do not match";
			
		}
			
		


	else{
		// instantiate new class
		$user = new Users;
		$result = $user->createAccount($_POST['fullname'], $_POST['email'], $_POST['phone_no'], $_POST['address'], $_POST['password'], $_POST['checkbox']);

		// instantiate new class
		// $user = new Users;
		// if ($user->checkUserEmailaddress($_POST['email']) {
		// $errormail = "<div class='alert alert-danger'>email address already exist, please enter another email</div>"
		// }
		if ($result) {
			
			echo $message = "<div class='alert alert-success'>Sign up successfull, please Login</div>";
			header("Location: continuelogin.php");
			exit;
		}
		
		else{
			echo $message = "<div class='alert alert-danger'>Invalid cridentials!</div>";
		}

	}

	
	
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
</head>
<body>
	<div class="container-fluid" style="margin-top: 150px; position: relative;">
		<div class="col-md-6 offset-0">
			<form action="" method="POST">

				<?php 

				if (!empty($errors)) {
					echo "<ul class='alert alert-danger'>";
					foreach ($errors as $key => $value) {
						echo "<li>$value</li>";
					}
					echo "</ul>";
				}
				elseif (!empty($message)) {
				echo $message;
				} 


				?>

				<h4 class="my-4 text-success">Create Account</h4>
			
				<div class="form-group">
					<input type="text" name="fullname" placeholder="Fullname" class="form-control" value="<?php if(!empty($_POST['fullname'])){
						echo $_POST['fullname'];
					} ?>" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" placeholder="Email Address" class="form-control" value="<?php if(!empty($_POST['email'])){
						echo $_POST['email'];
					} ?>" required>
				</div>
				<div class="form-group">
					<input type="tel" name="phone_no" placeholder="Phone Number" class="form-control" value="<?php if(!empty($_POST['phone_no'])){
						echo $_POST['phone_no'];
					} ?>" required>
				</div>
				<div class="form-group">
					<input type="text" name="address" placeholder="Address" class="form-control" value="<?php if(!empty($_POST['address'])){
						echo $_POST['address'];
					} ?>" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" id="pass1" class="form-control" required>
					<input type="checkbox" name="checkbox" id="pwdshow1" onclick="passchange1()"> <small>show password</small>
					<!-- <img src="images/eye_off_icon.png" id="signupslash1" onclick="passchange1()"> -->
					<!-- <img src="images/showeye_icon.png" id="signupshoweye1"> -->
					<small style="color: red;"><?php if (!empty($passerror)) {
						echo $passerror;
					} ?></small>
				</div>
				<div class="form-group">
					<input type="password" name="confirm_password" id="pass2" placeholder="Confirm Password" class="form-control" required>
					<input type="checkbox" name="checkbox" id="pwdshow2" onclick="passchange2()"> <small>show password</small>
					<!-- <img src="images/eye_off_icon.png" id="signupslash2" onclick="passchange2()"> -->
					<!-- <img src="images/showeye_icon.png" id="signupshoweye2"> -->
					<small style="color: red;"><?php if (!empty($passerror)) {
						echo $passerror;
					} ?></small>
				</div>
				<input type="checkbox" name="checkbox" required> I accept the <span class="text-success">Terms & Conditions</span> and Privacy and Cookie Notice.
				<br>
				<br>
				<input type="submit" name="create_account" value="CREATE ACCOUNT" class="form-control btn btn-success">
				<p>Already have an account?<a href="login.php" class="text-success"> LOGIN</a></p>
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

		function passchange2() {
			var pwd = document.getElementById("pass2");
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