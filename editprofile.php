<?php session_start();

include "userdashboardheader.php";
include "dogfairclasses.php";

if (!isset( $_SESSION['email'])) {
  header ("Location: login.php");
  die();
}

?>

<?php 
    $userobj = new Users;
    $user = $userobj->getUser($_SESSION['userid']);
    // var_dump($user);

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



// check if the method is post
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // validate
    $errors = array();
    if(empty($_POST['fullname'])){
        $errors[] = "Fullname field is required";
    }

    // if(empty($_POST['profilename'])){
    //     $errors[] = "Profile Name field is required";
    // }

    if(empty($_POST['phone'])){
        $errors[] = "Phone Number field is required";
    }

    if(empty($_POST['email'])){
        $errors[] = "Email Address field is required";
    }

    if(empty($_POST['address'])){
        $errors[] = "Address field is required";
    }


      // check if there are errors
      if(!empty($errors)){
          echo "<ul class='alert alert-danger'>";
            foreach($errors as $key => $value){
              echo "<li>$value</li>";
            }
          echo "</ul>";
      }
      else{
        // create object of user class
        $objuser = new Users;
        $newuser = $objuser->getallusers();

        // if (key($user) == 'success'){
        //   // redirect to user page
        //   $message = $user['success'];
        //   header("Location: userdashboard.php");
        // }
        if ($user) {
          $message = "<div class='alert alert-success'>Profile updated successfully!</div>";
        }
        else{
          $message = "<div class='alert alert-danger'>Failed to update profile!</div>";
        }
        
      }
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

      <!-- right side bar for Edit profile start -->
      <div class="col-8 shadow" style="padding: 25px;">
        <form action="" method="POST">
          <div class="tab-pane fade show active" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
            <?php 
              if (!empty($newuser)) {
                echo $message;
              }
            ?>
          	<h3 class="">Edit Profile</h3>
    		    <ol class="breadcrumb">
    		      <li class="breadcrumb-item active">Edit profile Form</li>
    		    </ol>


        <div class="control-group form-group">
          <div class="controls">
            <label>Full Name:</label>
              <input type="text" class="form-control" id="fullname" name='fullname' required value="<?php
                  // if(isset($_POST['fullname'])){
                  //     echo $_POST['fullname'];

              echo $_SESSION['fullname'] ?>">
              
            </div>
          </div>

        <div class="control-group form-group">
          <div class="controls">
            <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phone" required value="<?php
                  // if(isset($_POST['phone'])){
                  //     echo $_POST['phone'];
                  // }

                echo $_SESSION['phone'] ?>">
          </div>
        </div>

        <div class="control-group form-group">
          <div class="controls">
            <label>Email Address:</label>
              <input type="email" class="form-control" name='email' id="email" required value="<?php
                  // if(isset($_POST['email'])){
                  //     echo $_POST['email'];
                  // }

              echo $_SESSION['email']
              ?>">
              <p class="help-block text-muted">We promise never to spam you!</p>
          </div>
        </div>

        <div class="control-group form-group">
          <div class="controls">
            <label>Address:</label>
               <textarea name='address' id="address" class="form-control">
                <?php echo $_SESSION['address'] ?></textarea>
          </div>
        </div>
           
          <input type="hidden" name="userid" value="<?php echo $_REQUEST['userid'];?>">
          <input type="submit" name="updateuser" class="btn btn-success" id="sendMessageButton" value="Save Changes">
        
        </div>
      </form>
    </div>
	     <!-- right side bar Edit Profile end -->
	</div>
	<!-- main row end -->
</div>
<!-- main container end -->


  
<?php 
  include "mainfooter.php";

?>