<?php session_start();
include("userdashboardheader.php");
include "dogfairclasses.php";

if (!isset($_SESSION['email'])) {
	header('Location: login.php');
	die();
}

?>
<style type="text/css">
	div{
		border: 0px solid red;
	}

	.acct:hover{
		color: #FF8427;
	}

  a:hover{
		text-decoration: none;
	}
</style>

<?php 
    $userobj = new Users;
    $user = $userobj->getUser($_SESSION['userid']);
    // var_dump($user);

  ?>


<!-- main container start -->
<div class="container bg-white" style="margin-top: 20px;">
	<!-- main row start -->
    <div class="row">
    	<!-- left side bar column start -->
    <div class="col-md-4 shadow" style="padding: 10px;">
    	<?php
        if (empty($user['profile_pix'])) {
      ?>
      <img src="images/avatar_male_icon.png" class='img-fluid' alt="">
      <?php
        }else{
      ?>
	  <img src='userphoto/<?php echo $user['profile_pix'] ?>' class='img-fluid'>
	 <?php
    }
   ?>
    	<!-- <p><img src="images/avatar_male_icon.png" style="min-height: 100px"></p> -->
		<p><?php echo $_SESSION['fullname'] ?></p>
		<p><?php echo $_SESSION['email'] ?></p>
		<hr>
      <div class="list-group">
        <a class="list-group-item acct" href="userdashboard.php"><i class="fa fa-user text-decoration-none"></i> My Account</a>
        <a class="list-group-item acct" href="editprofile.php"><i class="fa fa-edit text-decoration-none"></i> Edit Profile</a>
        <a class="list-group-item acct" href="changepass.php"><i class="fa fa-edit text-decoration-none"></i> Change Password</a>
        <a class="list-group-item acct" href="uploaduserphoto.php"><i class="fa fa-edit text-decoration-none"></i> Upload Profile</a>
        
      </div>
      <a href="logout.php" class="btn btn-light mt-5" style="color: #FF8427; text-align: center;"><b>LOGOUT</b></a>
    </div>
    <!-- left side bar column end -->

    <!-- right side bar for Upload Profile start -->
    <div class="col-8 shadow" style="padding: 25px;">

    	<?php 
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // var_dump($_POST);
         // echo "<pre>";
         // print_r($_FILES);
         // echo "</pre>";
       
            // create instance of user class
       $objuser = new Users;
       // make reference to uploadphoto method
       $result = $objuser->uploadPhoto($_POST['profilename'], $_SESSION['userid']);
       // var_dump($_POST);
       //   echo "<pre>";
       //   print_r($result);
       //   echo "</pre>";
       if ($result === true) {
         echo "<div class='alert alert-success'>Profile photo successfully uploaded!</div>";
       }
       else{
        echo "<div class='alert alert-danger'>$result</div>";
       }
        
       
     }
       ?>

    	<form method="post" action="" enctype="multipart/form-data"> 
        	<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        		<h4>Profile Picture Upload</h4>
				<div class="form-group">
			    	<label class="">Profile Name</label>
			    	<input type="text" name="profilename" id="profilename" class="form-control" required>

			    	<label class="mt-4">Upload Picture</label>
				     <input type='file' name='profpix' class="" required>
			 	</div>
			     
			    <input type="submit" class="btn btn-success" value='Upload Photo'>
			 
			</div>
		</form>
	</div>
			        
	  <!-- right side bar for Upload Profile end -->
	</div>
	<!-- main row end -->
</div>
<!-- main container end -->



<?php
include("mainfooter.php");

?>