<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Dogs,dog breeds">
	<meta name="description" content="Most popular breeds in Nigeria.">
	<meta name="author" content="Oyewole Segun">
	<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
	<link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
	<link rel='stylesheet' type='text/css' href='dogfair.css'>
	<title>Dogfair | Homepage</title>

	<style type="text/css">

	.nav-link{ 
		color:#000 !important;
	}
		.nav-link:hover{
		color:#FF8427 !important;
	}
	.btt{
		color: #fff !important;
	}

	a:hover{
		text-decoration: none;
	}

	#signupslash1{
		position: relative;
		width: 20px;
		height: 20px;
		left: 600px;
		bottom: 30px;
	}

	#signupslash2{
		position: relative;
		width: 20px;
		height: 20px;
		left: 600px;
		bottom: 30px;
	}

	#signupshoweye1{
		position: relative;
		width: 30px;
		height: 30px;
		left: 640px;
		bottom: 30px;
	}

	#signupshoweye2{
		position: relative;
		width: 30px;
		height: 30px;
		left: 640px;
		bottom: 30px;
	}

	#loginslash1{
		position: relative;
		width: 20px;
		height: 20px;
		left: 500px;
		bottom: 30px;
	}

	</style>
</head>
<body style="background: #FFFCF9;">
	
		<!-- Navbar -->

		<div class="container-fluid">
			
			<nav class="navbar shadow navbar-expand-lg navbar-light bg-white fixed-top">
				<div class="container-fluid">
				  <a class="navbar-brand" href="index.php"><img src="images/dogfair_logo5.png" width="120px" height="70px"></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

			<div class="row">
				<div class="col-md-12">
				  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<div>
				<form class="form-inline my-2">
					 <input class="form-control" type="text" placeholder="Search breed here.." aria-label="Search">
					 <button class="btn btn-outline-warning text-solid mx-2 my-sm-0" type="submit" style='color:#000;'>Search</button>
				</form>
				</div>

				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
				      </li>
				      <!-- <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          BREEDS
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="#">German Shepherd</a>
				          <a class="dropdown-item" href="#">Rowtweiler</a>
				          <a class="dropdown-item" href="#">Pitbull</a>
				          <a class="dropdown-item" href="#">Siberian Husky</a>
				          <a class="dropdown-item" href="#">Boerboel</a>
				          <a class="dropdown-item" href="#">Lhasa Apso</a>
				          <a class="dropdown-item" href="#">Caucasian</a>
				          <a class="dropdown-item" href="#">English Mastiff</a>
				          <a class="dropdown-item" href="#">English Bulldog</a>
				          <a class="dropdown-item" href="#">Chow Chow</a>
				          <a class="dropdown-item" href="#">Samoyed</a>
				        </div>
				      </li> -->
				      <li class="nav-item mx-2">
				        <a class="nav-link" href="#"><img src="images/notification_icon.png" alt="" width="20px" height="20px"></a>
				      </li>
				      <li class="nav-item mx-2">
				        <a class="nav-link" href="#"><img src="images/cart_icon.png" alt="" width="20px" height="20px"> Cart <span class="badge badge-warning" id="add">0</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link btn btn-warning mx-2 btt" href="login.php">LOGIN</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link btn btn-warning btt" href="signup.php">SIGN UP</a>
				      </li>
				    </ul>
				  </div>
				  </div>	
				</div>
			</div>
			</nav>
			


		</div>