<?php session_start();
include("adminheader.php");
include 'dogfairclasses.php';


if (!isset($_SESSION['email'])) {
	header("Location: adminlogin.php");
	exit();
}
else{

	// Instantiate new class
	$user = new Users;
	$result = $user->displayAds();
}

?>

<!-- container begin -->
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-12 mt-5">
			<h1>Admin<small> List All Breeds</small></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2 offset-10">
			<a href="adminviewallbreeds.php" class="m-3 btn btn-warning btn-sm text-light d-flex justify-content-end">View All Breeds</a>
		</div>
	</div>
	
	<!-- table begin -->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-hover">
				<!-- table header begin -->
			  <thead>

			    <tr>
			      <th>S/N</th>
			      <th>usersid</th>
			      <th>Full Address</th>
			      <th>Breed Name</th>
			      <th>Contact Name</th>
			      <th>Contact No</th>
			      <th>Price</th>
			      <th>Age</th>
			      <th>Quantity</th>
			      <th>Gender</th>
			      <th>Description</th>
			      <th>Photo</th>
			      <th>Created_at</th>
			      <th>Updated_at</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <!-- table header End -->

			  <!-- table body begin -->
			  <tbody>
			  	<?php
			  	$counter = 1;
			  	foreach ($result as $key => $value) {
			  		// code...
			  	
			  	?>
			  	<tr>
			      <th><?php echo $counter++ ?></th>
			      <td><?php echo $value["users_id"]; ?></td>    
			      <td><?php echo $value["full_address"]; ?></td>
			      <td><?php echo $value["breed_name"]; ?></td>
			      <td><?php echo $value["contact_name"]; ?></td>
			      <td><?php echo $value["contact_phonenumber"]; ?></td>
			      <td><?php echo $value["price"]; ?></td>
			      <td><?php echo $value["age"]; ?></td>
			      <td><?php echo $value["quantity"]; ?></td>
			      <td><?php echo $value["gender"]; ?></td>
			      <td><?php echo $value["description"]; ?></td>
			      <td><img src="<?php echo $value['photo'] ?>" width='60px' alt="<?php echo $value['photo'] ?>"></td>
			      <td><?php echo $value["created_at"]; ?></td>
			      <td><?php echo $value["updated_at"]; ?></td>
			      <td><a href="" class=""><i class="fa fa-edit" style="font-size: 18px;" title="Edit"></i></a><br>
			      	<a href="" class=""><i class="fa fa-list" style="font-size: 18px;" title="Details"></i></a><br>
			      	<a href="" class=""><i class="fa fa-trash" style="font-size: 18px;" title="Delete"></i></a></td>
			     </tr>
			     <?php } ?> 
			 </tbody>
			 <!-- table body End -->

			</table>
		</div>
	</div>
	<!-- table End -->



	<!-- container End -->
</div>





<?php
include("mainfooter.php");

?>