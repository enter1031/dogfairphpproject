<?php session_start();
include("adminheader.php");
include 'dogfairclasses.php';

if (!isset($_SESSION['email'])) {
	header("Location: adminlogin.php");
	exit();
}
else{
	// instantiate new class
	$objuser = new Users;
	$result = $objuser->getallusers();
	
}



?>

<!-- container begin -->
<div class="container">

	<div class="row mt-5">
		<div class="col-md-12 mt-5">
			<h1>Admin<small> View All Users</small></h1>
		</div>
	</div>

	
	<div class="container mt-5 clearfix">
		<?php 

		if (!empty($result)) {
			
		 foreach ($result as $key => $value) {

		 ?>
		<!-- 1st column -->
		<div class="col-md-3 my-2" style="float: left;">
			<!-- card begin -->
			<div class="card-group">
			  <div class="card mx-2">
			    <div class="card-body">
			     <p class="card-title"><img class="img-fluid" src="userphoto/<?php echo $value['profile_pix'] ?>"></p>
			      <h5 class="card-text text-center"><?php echo $value['fullname']; ?></h5>
			    </div>
			    <a class="card-footer text-center" href=""> 
			    	<small class="text-dark" href=""><?php echo $value['email_address']; ?></small>
			    </a>
			  </div>
			</div>

			<!-- card End -->
		</div>
		<?php
			}

		}
		?>
	</div>
	
		


<!-- container End -->
</div>




<?php
include("mainfooter.php");

?>