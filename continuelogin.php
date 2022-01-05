<?php session_start();

include("mainheader.php");

// include class
include('dogfairclasses.php');

if (!isset($_SESSION['email'])) {
	header("Location: login.php");
	exit();
}
else{

	// instantiate the class
	$users = new Users;
	$result = $users->login($_POST['email'], $_POST['password']);
}



?>

	<div class="container mt-5">
	<div class="row shadow my-5">
		<div class="col-md-6 offset-3 text-success">
			<div class="jumbotron my-5" style="background-color: rgba(40, 167, 69,0.3);">
			  <h1 class="">Hello, <?php echo $_SESSION['fullname'].'!' ?></h1>
			  <p class="lead alert alert-success">Sign Up successfull.</p>
			  <hr class="my-4">
			  <a class="btn btn-warning text-info" href="login.php" role="button">Click here to login</a>
			</div>
		</div>
	</div>
</div>






<?php
include("mainfooter.php");

?>