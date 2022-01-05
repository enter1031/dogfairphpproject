<?php session_start();
include "dogfairclasses.php";

if (!isset($_SESSION['email'])) {
		include("mainheader.php");
}
else{
	include("userdashboardheader.php");
}		
	
	
		if(!isset($_POST['register'])){
	// instantiate the class
	$users = new Users;
	$breeds = $users->displayAd($_GET['id']);


		// echo "<pre>";
		// print_r($breeds);
		// echo "</pre>";

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
		// header("Location: payment.php");
		// exit;
		else{
			$usersobj = new Users;
			$addcart = $usersobj->addToCart($_POST['breedname'], $_POST['qty'], $_POST['amount'], $_POST['subtotal'], $_POST['usersid']);

			if ($addcart) {
				echo "<div class='alert alert-success'>Cart added successfully</div>";
			}
			else{
				echo "<div class='alert alert-danger'>Cart Failed</div>";
			}
		}
	}

			// foreach ($breeds as $value) {
			// 		$_SESSION['adsid'] = $value['ads_id'];
			// 		$_SESSION['qty'] = $value['quantity'];
			// 		$_SESSION['price'] = $value['price'];
			// 		$_SESSION['breedname'] = $value['breed_name'];
			// 		$_SESSION['photo'] = $value['photo'];
			// }
			// echo print_r($_SESSION['adsid']);		

?>

		<?php 
			
		?>
	<div class='container'>
		<h5 class="mt-5">Cart (items)</h5>
		<form action="" method="POST">
			<div class='row alert alert-warning'>
				<div class='col-md-3'>ITEMS</div>
				<div class='col-md-4'>NAME</div>
				<div class='col-md-1'>QUANTITY</div>
				<div class='col-md-2'>PRICE</div>
				<div class='col-md-2'>SUBTOTAL</div>
			</div>

			<div class='row alert alert-success'>

				<div class="col-md-3">
					<img src="<?php echo $photo ?>" class="img img-fluid" alt="">
					<hr>
					<p>SHARE THIS PRODUCT</p>
					<p><a href='facebook.com'><i class="fab fa-facebook"></i></a> <a href='twitter.com'><i class="fab fa-twitter"></i></a></p>
				</div>
					
				<div class='col-md-4'>
					<?php echo $name; ?>

				</div>

				<div class='col-md-1'>
					<input type="number" name="qty" style="width: 50px" value="<?php echo $quantity; ?>">
				</div>

				<div class='col-md-2'>
					<?php echo $price; ?>
				</div>

				<div class='col-md-2'>
					<?php echo $price; ?>
				</div>
				
			</div>
			<div class="row mb-2">
				<div class='col-md-12'><b>TOTAL: <?php echo $price; ?></b></div>
			</div>
			<a href="index.php"><input type="remove" name="remove" value="REMOVE" class="btn btn-danger"></a>
			<a href="payment.php"><input type="register" id="btncheck" name="checkout" value="CHECKOUT" class="btn btn-warning"></a>
		</form>
			
	</div>


<?php
include("mainfooter.php");

?>
