<?php
include("userdashboardheader.php");

include "dogfairclasses.php";

if (!isset($_SESSION['email'])) {
	header("Location: login.php");
	exit();
}
else{

	// instantiate new class
	$objuser = new Users;
	$result = $objuser->postAds();
}


?>

<div class="container">
	<div class="row shadow my-5 bg-white">
		<div class="col-md-6 offset-3 text-success">
			<div class="jumbotron my-5" style="background-color: rgba(40, 167, 69,0.3);">
			  <h1 class="">Hello, Enter!</h1>
			  <p class="lead">Your product has been posted successfully.</p>
			  <hr class="my-4">
			  <p>It will be review in the next 4 hours. Thank you.</p>
			  <a class="btn btn-dark" href="#" role="button">Home</a>
			  <a class="btn btn-warning text-light" href="#" role="button">Continue Posting</a>
			</div>
		</div>
	</div>
</div>




<?php
include("mainfooter.php");

?>