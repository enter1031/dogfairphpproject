<?php session_start();
include("adminheader.php");
include("dogfairclasses.php");


if (!isset($_SESSION['email'])) {
	header("Location: adminlogin.php");
	exit();
}
else{

	// instantiate new class
	$objuser = new Users;
	$admindetails = $objuser->getAdminDetails();

	// create session variables
		foreach ($admindetails as $details) {
		$_SESSION['username'] = $details['username'];
 		$_SESSION['email'] = $details['email_address'];
 		$_SESSION['phone'] = $details['phone_number'];
 		$_SESSION['profilepix'] = $details['profile_pix'];

		}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashbord</title>
</head>
<body>

	<div class="container" style="margin-top: 150px;">

		<h1 class="mb-4"><small>Admin Dashboard</small></h1>
		<h4 class="mb-4">Welcome <small><?php echo $_SESSION['username'] ?></small></h4>
		<h6><?php echo $_SESSION['email'] ?></h6>
		
			<!-- card begin -->
				<div class="card-group">
			  <div class="card text-white bg-success mx-2">
			  	<div><i class=" fas fa-user-check fa-xl p-4"></i></div>
			    <div class="card-body">
			     <h5 class="card-title">All users</h5>
			      <p class="card-text">50 users</p>
			    </div>
			    <a class="card-footer text-white" href="adminlistallusers.php"> 
			    	<small class="text-white float-left">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			  		
			    </a>
			  </div>
			  <div class="card text-white bg-info mx-2">
			    <div><i class=" fas fa-shopping-bag fa-xl p-4"></i></div>
			    <div class="card-body">
			      <h5 class="card-title">All breeds</h5>
			      <p class="card-text">100 items</p>
			    </div>
			    <a class="card-footer text-white" href="adminlistallbreeds.php">
			      <small class="text-white float-left">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			    </a>
			  </div>
			  <div class="card text-white bg-dark mx-2">
			    <div><i class=" fas fa-ban fa-xl p-4"></i></div>
			    <div class="card-body">
			      <h5 class="card-title">Failed Transactions!</h5>
			      <p class="card-text">2 transactions</p>
			    </div>
			    <a class="card-footer text-white" href="">
			      <small class="text-white float-left">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			    </a>
			  </div>
			</div>
		<!-- card End -->

		<!-- Begin card -->
			<div class="row mt-4">
				<div class="col-md-12">
					<div class="card-group">
			  <div class="card text-white bg-primary mx-2">
			  	<div><i class=" fas fa-user-check fa-xl p-4"></i></div>
			    <div class="card-body">
			     <h5 class="card-title">All users</h5>
			      <p class="card-text">50 users</p>
			    </div>
			    <a class="card-footer text-white" href=""> 
			    	<small class="text-white float-left" href="">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			  		
			    </a>
			  </div>
			  <div class="card text-white bg-secondary mx-2">
			    <div><i class=" fas fa-shopping-bag fa-xl p-4"></i></div>
			    <div class="card-body">
			      <h5 class="card-title">All items</h5>
			      <p class="card-text">100 items</p>
			    </div>
			    <a class="card-footer text-white" href="">
			      <small class="text-white float-left">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			    </a>
			  </div>
			  <div class="card text-white bg-warning mx-2">
			    <div><i class=" fas fa-ban fa-xl p-4"></i></div>
			    <div class="card-body">
			      <h5 class="card-title">Failed Transactions!</h5>
			      <p class="card-text">2 transactions</p>
			    </div>
			    <a class="card-footer text-white" href="">
			      <small class="text-white float-left">View details</small>
			      <i class=" fas fa-angle-right d-flex justify-content-end float-right"></i>
			    </a>
			  </div>
			</div>
				</div>
			</div>
		<!-- End card -->


	</div>

</body>
</html>




<?php
include("mainfooter.php");

?>