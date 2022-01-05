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
	$result = $objuser->displayAds();
}

// $_SESSION['breedname'] = $result['breed_name'];
// $_SESSION['price'] = $result['price'];
?>

<!-- container begin -->
<div class="container">

	<div class="row mt-5">
		<div class="col-md-12 mt-5">
			<h1>Admin<small> View All Breeds</small></h1>
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
			     <p class="card-title"><a href="breeddetails.php?id=<?php echo $value['ads_id'];?>	"><img class="img-fluid" src="<?php echo $value['photo'] ?>"></a></p>
			      <h5 class="card-text text-center"><a href=""><?php echo $value['breed_name']; ?></a></h5>
			    </div>
			    <a class="card-footer text-center" href=""> 
			    	<small class="text-dark"><?php echo $value['price']; ?></small>
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