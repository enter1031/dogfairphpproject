<?php session_start();
include 'dogfairclasses.php';

if (!isset($_SESSION['email'])) {
		include("mainheader.php");
}
else{
	include("userdashboardheader.php");
}

		// instantiate new class
			$objuser = new Users;
			$result = $objuser->displayAds();


		foreach ($result as $breed) {
	
		$_SESSION['adsid'] = $breed['ads_id'];
	}

	// echo print_r($breed['ads_id']);
	$id=$_SESSION['adsid'];
?>
		
<div class="container-fluid">
				
				<!-- After navbar background -->
		<div id="banner" class="carousel slide" data-ride="carousel">
			
			<div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="images/after_navbar4.jpg" width="100%" height="500px" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="images/after_navbar3.jpg" width="100%" height="500px" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="images/after_navbar2.jpg" width="100%" height="500px" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="images/after_navbar5.jpg" width="100%" height="500px" class="d-block w-100" alt="...">
			</div>
			</div>
			<a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#banner" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>

		<!-- <div class='container'>
		<div class='row'>
			<div class='col-md-7'>
		<div id="banner" class="carousel slide" data-ride="carousel">
		 <ol class="carousel-indicators">
			<li data-target="#banner" data-slide-to="0" class="active"></li>
			<li data-target="#banner" data-slide-to="1"></li>
			<li data-target="#banner" data-slide-to="2"></li>
		</ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/after_navbar2.jpg" class="d-block w-100" alt="operatingsystem">
	   <div class="carousel-caption d-none d-md-block">
        <h5>Moat Academy for Developers</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/after_navbar3.jpg" class="d-block w-100" alt="backup">
	   <div class="carousel-caption d-none d-md-block">
        <h5>Enter Dev</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/after_navbar4.jpg" class="d-block w-100" alt="cpanel">
	   <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>
			</div>
			
			<div class='col-md-5'>
			
			</div>
		</div>
		
		<div class='row'>
			<div class='col-md-6'>
		
			</div>
			
			<div class='col-md-6'>
		
			</div>
		</div>
		
	</div>
 -->



			<!-- Item1 -->
			<div class="row">
				<div class="col-md-12">
					<?php
				$date = date("d-M-Y, h:m:s a");

				echo "<div class='border rounded d-flex justify-content-end font-weight-bold bg-white'>".$date."</div>";
			?>
				</div>
			</div>

		<div class="container mt-5 shadow p-3 mb-5 bg-white rounded">
			<h4 style="text-align: center;" class="bg-warning">Top Breeds</h4>
			<div class="row mx-5">
						<?php 

				if (!empty($result)) {
					
				 foreach ($result as $key => $value) {
				 		$value['ads_id'];
				 	// $id =$_SESSION['adsid']

				 		// echo "<pre>";
				 		// print_r($value);
				 		// echo "</pre>";
				 		
				 ?>

				<div class="col-md-4 border my-2 animate__animated animate__pulse">
					
					<a href="breeddetails.php?id=<?php echo $value['ads_id'];?>"><img src="<?php echo $value['photo'] ?>" width="100%" height="250px" class="rounded-lg">
					<p style="color: #FF8427;"><?php echo $value['breed_name']; ?></p>
					<p style="color: #000"><b><?php echo '&#8358;'.number_format($value['price']); ?></b></p>
					</a>

				</div>
				
				<?php 
						}
					}
				 ?>
			</div>
		</div>

			

</div>
			

<?php
include("mainfooter.php");

?>
		