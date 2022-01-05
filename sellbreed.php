<?php session_start();
include("userdashboardheader.php");
include "dogfairclasses.php";

	if (!isset($_SESSION['email'])) {
	header('Location: login.php');
	die();
	}

if (!empty($_POST)) {

	// if (empty($_POST['fulladdress'] || $_POST['breedname'] || $_POST['contname'] || $_POST['contnumber'] || $_POST['price'] || $_POST['age'] || $_POST['quantity'] || $_POST['gender'] || $_POST['descripton'] || $_FILES['photo'])) {

	// 		$message = "<div class='alert alert-danger'>All feilds are required!</div>";
	// 	}

	$errors = array();
	if (empty($_POST['fulladdress'])) {
		$errors[] = "Full address field is required";
	}
	if (empty($_POST['breedname'])) {
		$errors[] = "Breed name field is required";
	}
	if (empty($_POST['contname'])) {
		$errors[] = "Contact name field is required";
	}
	if (empty($_POST['contnumber'])) {
		$errors[] = "Contact number field is required";
	}
	if (empty($_POST['price'])) {
		$errors[] = "Price field is required";
	}
	if (empty($_POST['age'])) {
		$errors[] = "Age field is required";
	}
	if (empty($_POST['quantity'])) {
		$errors[] = "Quantity field is required";
	}
	if (empty($_POST['gender'])) {
		$errors[] = "Gender field is required";
	}
	// if (empty($_POST['description'])) {
	// 	$errors[] = "Description field is required";
	// }
	// if (empty($_POST['photo'])) {
	// 	$errors[] = "Photo upload is required";
	// }
	
		else{
			// instantiate new class
			$obj = new Users;

			$result = $obj->postAds($_POST['fulladdress'], $_POST['breedname'], $_POST['contname'], $_POST['contnumber'], $_POST['price'], $_POST['age'], $_POST['quantity'], $_POST['gender'], $_POST['descripton'], $_FILES['photo']);

			if (!empty($result)) {
			 $message = "<div class='alert alert-success'>Ads posted successfully</div>";
			}
			else{
				 $message = "<div class='alert alert-danger'>Invalid credentials!</div>";
			}

		}


			
}

?>

<!-- container begin -->
<div class="container">

	<!-- div wrapper begin -->
	<div class="row shadow mt-5">
		<div class="col-md-6 offset-3 my-5 shadow bg-white">
				<?php 

				if (!empty($errors)) {
					echo "<ul class='alert alert-danger'>";
					foreach ($errors as $key => $value) {
						echo "<li>$value</li>";
					}	
					echo "</ul>";
				}

				elseif (!empty($message)) {
					echo $message;
				}

				?>	

			<!-- title begin -->
			<div class="row my-3">
				<div class="col-md-12 d-flex justify-content-center">
					<h4>ADVERTISE YOUR DOGS</h4>
				</div>
			</div>
			<!-- title End -->

			<!-- form begin -->
			<form action="" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label>State:</label>
					<?php 
					$state = array("Abia", "Adamawa", "Akwa Ibom", "Anambra",  "Bauchi","Bayelsa", "Benue", "Borno", "Cross River", "Delta","Ebonyi","Edo","Ekiti", "Enugu","FCT - Abuja", "Gombe", "Imo","Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi","Kogi","Kwara", "Lagos", "Nasarawa","Niger", "Ogun","Ondo","Osun","Oyo", "Plateau", "Rivers", "Sokoto","Taraba","Yobe", "Zamfara");

					echo "<select name='state' class='form-control'>";
							echo"<option value=''>--choose state--</option>";
						for ($x=0; $x < count($state) ; $x++) { 
							echo"<option value=$x>$state[$x]</option>";
						}

					echo "</select>";
					?>
				</div>
				<div class="form-group">
					<label>LGA:</label>
					<select name="state" class="form-control">
						<option value="">--choose lga--</option>
						<option value="ikeja">Ikeja</option>
						<option value="allen">Allen</option>
						<option value="yaba">Yaba</option>
					</select>
				</div>
				<div class="form-group">
					<label>Full Address:</label>
					<textarea name="fulladdress" placeholder="Your full Address" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Breed Name:</label>
					<input type="text" name="breedname" placeholder="Breed name" class="form-control">
				</div>
				<div class="form-group">
					<label>Contact Name:</label>
					<input type="text" name="contname" placeholder="Enter your name" class="form-control">
				</div>
				<div class="form-group">
					<label>Contact Phone Number:</label>
					<input type="text" name="contnumber" placeholder="Enter your phone number" class="form-control">
				</div>
				<div class="form-group">
					<label>Price:</label>
					<input type="text" name="price" placeholder="e.g (#80,000.00)" class="form-control">
				</div>
				<div class="form-group">
					<label>Age:</label>
					<input type="text" name="age" placeholder="Dog age (e.g 4 months)" class="form-control">
				</div>
				<div class="form-group">
					<label>Quantity:</label>
					<input type="number" name="quantity" placeholder="Quantity" class="form-control">
				</div>
				<div class="form-group">
					<label>Gender:</label>
					<select name="gender" class="form-control">
						<option value="">--select gender--</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label>Description:</label>
					<textarea name="descripton" placeholder="Dog descripton" class="form-control" required>	
					</textarea>
				</div>
				<div class="form-group">
					<!-- upload image -->
					<label>Upload a photo</label>
					<input type="file" name="photo" required><br>
					<small>images only (png, jpg, jpeg, svg)</small>
				</div>
				<br>
				<input type="submit" value="POST" class="btn btn-block btn-success mb-3">
				
			</form>
			<!-- form End -->

		</div>
	</div>
	<!-- div wrapper End -->

</div>
<!-- container End -->




<?php
include("mainfooter.php");

?>