<?php
include("mainheader.php");
include "dogfairclasses.php";

// if (!isset($_SESSION['email'])) {
// 	header('Location: login.php');
// 	die();
// }

	if (isset($_POST['submitemail']) && $_POST['email']) {

		$user = new Users;
		$result = $user->forgotPassword($_POST['email']);

		if ($result) {
			session_start();
			$_SESSION ['key'] = rand();
			$id = $result['users_id'];
			header("Location: resetpassword.php?id=$id");
		}
		
	// 	$result = $user->forgotPassword($_POST['email_address']);
	// 	if ($result) {
	// 	header("Location: resetpassword.php");
	// 	exit;
	// }
	else{
		$error = "<div class='alert alert-danger'>User not found</div>";
	}


}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
</head>
<body>
	<div class="container offset-3" style="margin-top: 150px;">
		<div class="col-md-6">
			<form action="" method="POST">
				<h4 class="my-4 text-success">Forgot Password</h4>
				<p>Please enter the e-mail address associated with your account. We will send you a link to this e-mail address to reset your password.</p>
				<br>
				<?php
				if (!empty($error)) {
					echo $error;
				}
				?>
				<div class="form-group">
					<input type="email" name="email" placeholder="Enter your Email Address" class="form-control" required>
				</div>
				<br>
				<input type="submit" name="submitemail" value="SUBMIT" class="form-control btn btn-success">
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