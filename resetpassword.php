<?php session_start();
include("mainheader.php");
include "dogfairclasses.php";


	if (!isset($_SESSION['key'])) {
		header("Location: login.php");
	}
	if (!empty($_POST)) {
		$passerror = array();
		if (strlen($_POST['password']) < 6) {
			$passerror['passlength'] = "Password must be up to 6 characters";
		}
		if (strlen($_POST['confirmpassword']) < 6) {
			$passerror['passlength'] = "Password must be up to 6 characters";
		}
		if ($_POST['password'] !== $_POST['confirmpassword']) {
			$passerror['passmatch'] = "Password do not match";	
		}
		else{
			$user = new Users;
			$result = $user->resetPassword($_GET['id'], $_POST['password']);

			if ($result) {
				$message = "<div class='alert alert-success'>Your password has been reset successfully!</div>";
				session_destroy();
			}
			else{
				$message = "<div class='alert alert-danger'>Failed to reset password</div>";
			}	
	}
	
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
</head>
<body>
	<div class="container offset-3" style="margin-top: 150px;">
		<div class="col-md-6">
			<form action="" method="POST">
				<?php
					if (!empty($message)) {
						echo $message;
					}
				?>
				<h4 class="my-4 text-success">Password Reset</h4>
				<div class="form-group">
					<input type="password" name="password" placeholder="Enter your New Password" class="form-control" required>
					<small style="color: red;"><?php if (!empty($passerror)) {
						echo $passerror['passlength'];
					}
					?></small>
				</div>
				<div class="form-group">
					<input type="password" name="confirmpassword" placeholder="Confirm your New Password" class="form-control" required>
					<small style="color: red;"><?php if (!empty($passerror)) {
						echo $passerror['passlength'];
					} ?></small>
				</div>
				<br>
				<input type="submit" name="reset" value="RESET PASSWORD" class="form-control btn btn-success">
				<br>
				<br>
				<div class="text-success text-center"><a href="login.php" class="text-success">GO BACK TO LOGIN</a></div>
			</form>
		</div>
	</div>
</body>
</html>





<?php
include("mainfooter.php");

?>