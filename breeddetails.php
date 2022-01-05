<?php session_start();
include "dogfairclasses.php";

if (!isset($_SESSION['email'])) {
		include("mainheader.php");
}
else{
	include("userdashboardheader.php");
}

	// instantiate the class
	$users = new Users;
	$breeds = $users->displayAd($_GET['id']);

		// echo "<pre>";
		// print_r($breeds);
		// echo "</pre>";
	$totalcart = 0;
	$_SESSION['addcart'] = $totalcart;
	if (isset($_SESSION['cart_array'])) {
		foreach ($_SESSION['cart_array'] as $value) {
			$totalcart += $value[quantity];
		}
		echo $_SESSION['addcart'];
	}

		if (!empty($breeds)) {
			
			$name = $breeds['breed_name'];
			$desc = $breeds['description'];
			$price = $breeds['price'];
			$age = $breeds['age'];
			$quantity = $breeds['quantity'];
			$gender = $breeds['gender'];
			$photo = $breeds['photo'];
			$adsid = $breeds['ads_id'];
		}
		else{
			if(empty($_SESSION['cart'])){
			$_SESSION['cart']=[];
			}
			if(empty($_SESSION['cart'][$breeds])){
			$_SESSION['cart'][$breeds]=1;
			}
			else{
			$_SESSION['cart'][$breeds]++;
			}
			// die("I got here");
			// header("Location: addtocart.php");
		}

	
	
?>

<div class="container bg-white">
	<div class="row shadow mt-5">
		<div class="col-md-6">
			<img src="<?php echo $photo ?>" class="img img-fluid" alt="">
			<hr>
			<p>SHARE THIS PRODUCT</p>
			<p><a href='facebook.com'><i class="fab fa-facebook"></i></a> <a href='twitter.com'><i class="fab fa-twitter"></i></a></p>
		</div>

		
		<?php 


		 ?>

		<div class="col-md-6 my-5">
			<p>BREED: <span><b><?php echo $name ?></b></span></p>
			<p>PRICE: <span><b><?php echo '&#8358;'.number_format($price) ?></b></span></p>
			<p>AGE: <span><b><?php echo $age ?></b></span></p>
			<p>QUANTITY: <span><b><?php echo $quantity ?></b></span></p>
			<p>GENDER: <span><b><?php echo $gender ?></b></span></p>
			<p>DESCRIPTION: <span><b><?php echo $desc ?></b></span></p>

			<a href="addtocart.php?id=<?php echo $adsid; ?>"><button class="btn btn-warning font-weight-bold btn-block btn1" style="color: #fff;" onclick="addcart();">ADD TO CART</button></a>

		</div>
		
	</div>
</div>
	<?php 

	?>
<script type="text/javascript">

			var counter = 0;
			function addcart(){
				counter = counter + 1;

				if (counter <= 1) {
					document.getElementById('add').innerHTML=counter+"";
				}
				else{
					document.getElementById('add').innerHTML=counter+"";
				}
			}
	
		
	</script>


<?php
include("mainfooter.php");

?>