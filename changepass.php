<?php session_start();

include "userdashboardheader.php";
include "dogfairclasses.php";

if (!isset( $_SESSION['email'])) {
  header ("Location: login.php");
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
  

<?php

  if (!empty($_POST)) {
    // code...
  } else {
    // code...
  }
  

     

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

			<!-- right side bar for Change password start -->
      <div class="col-8 shadow" style="padding: 25px;">
        <form action="" method="POST">
	       <div class="tab-pane fade show active" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
	       	<h4>Change Password</h4>
	       		<div class="form-group">
	       			<label>Current password</label>
	       			<input type="password" name="currentpassword" class="form-control" required value="<?php
                  // if(isset($_POST['currentpassword'])){
                  //     echo $_POST['currentpassword'];

              if(!empty($_POST['currentpassword'])){
                      echo $_POST['currentpassword'];
                  }
              ?>">
	       		</div>

	       		<div class="form-group">
	       			<label>New password</label>
	       			<input type="password" name="newpassword" class="form-control" required>
	       		</div>

	       		<div class="form-group">
	       			<label>Confirm password</label>
	       			<input type="password" name="confirmpassword" class="form-control" required>
	       		</div>

	       		<input type="submit" name="changepassword" class="btn btn-success" value="Change Password">
	       </div>
      </form>
	  </div>
	  <!-- right side bar for Change password end -->
	</div>
	<!-- main row end -->
</div>
<!-- main container end -->


  
<?php 
  include "mainfooter.php";

?>