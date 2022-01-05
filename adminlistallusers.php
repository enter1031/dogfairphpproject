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
	$result = $user->getallusers();
}




?>

<!-- container begin -->
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12 mt-5">
			<h1>Admin<small> List All Users</small></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2 offset-10">
			<a href="adminviewallusers.php" class="m-3 btn btn-warning btn-sm text-light d-flex justify-content-end">View All Users</a>
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
			      <th>Fullname</th>
			      <th>Email</th>
			      <th>Phone Number</th>
			      <th>Address</th>
			      <th>Profile Name</th>
			      <th>Profile_pix</th>
			      <th>Created_at</th>
			      <th>Updated_at</th>
			      <th>Status</th>
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
			      <td><?php echo $value["fullname"]; ?></td>    
			      <td><?php echo $value["email_address"]; ?></td>
			      <td><?php echo $value["phone_no"]; ?></td>
			      <td><?php echo $value["address"]; ?></td>
			      <td><?php echo $value["profile_name"]; ?></td>
			      <td><?php echo $value["profile_pix"]; ?></td>
			      <td><?php echo $value["created_at"]; ?></td>
			      <td><?php echo $value["updated_at"]; ?></td>
			      <td><?php echo $value["status"]; ?></td>
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