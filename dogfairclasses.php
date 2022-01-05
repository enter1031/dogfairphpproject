<?php
include("constants.php");


// begin class
class Users{
// class variables/properties
	public $dbconnect;
	public $fullname;
	public $emailaddress;
	public $phone;
	public $address;
	public $password;


	// member method functions
	public function __construct(){
		$this->dbconnect = new Mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

		//check if the database is connected
		// if ($this->dbconnect->connect_error) {
		// 	echo "Connection to database Failed".$this->dbconnect->error;
		// }
		// else{
		// 	echo "Connection to database Successful";
		// }
	}
		

		// create account/signup method
	function createAccount($fullname, $emailaddress, $phone, $address, $password){

		$password = md5($password);

		// write the query
		$sql = "INSERT INTO users(fullname, email_address, phone_no, address, password) VALUES('$fullname', '$emailaddress', '$phone', '$address', '$password')";

		// run the query
		$result = $this->dbconnect->query($sql);

		//check for error
		if (!empty($this->dbnconnect->error)) {
			echo "Sorry connection error, please try again";
		}

		if ($this->dbconnect->affected_rows > 0) {

			return true;
		}
		else{
			return false;
		}

	}


	// user login
	function login($email, $password){
		$pwd = md5($password);

		// write the query
		$sql = "SELECT * FROM users WHERE email_address = '$email' AND password = '$pwd'";

		// run the query
		$result = $this->dbconnect->query($sql);
		$result = $result->fetch_assoc();


		//check for error
		// if ($this->dbconnect->error) {
		// 	echo "Connection error, please try again";
		// }
		if ($this->dbconnect->affected_rows > 0) {

			return $result;
		}
		else{
			return false;
		}

	}


	// user forgotpassword
	function forgotPassword($email){

		// write the query
		$sql = "SELECT * FROM users WHERE email_address = '$email'";

		// run the query
		$result = $this->dbconnect->query($sql);
		$result = $result->fetch_assoc();

		//check for error
		// if ($this->dbconnect->error) {
		// 	echo "Connection error, please try again";
		// }
		if ($this->dbconnect->affected_rows == 1) {

			return $result;
		}
		else{
			return false;
		}

	}


	// user resetPassword
	function resetPassword($usersid, $password){
		$pwd = md5($password);

		// write the query
		$sql = "UPDATE users SET password = '$pwd' WHERE users_id = '$usersid'";

		// run the query
		$result = $this->dbconnect->query($sql);

		//check for error
		// if ($this->dbconnect->error) {
		// 	echo "Connection error, please try again";
		// }
		if ($this->dbconnect->affected_rows = 1) {

			return $result;
		}
		else{
			return false;
		}

	}


	// check email address
		public function checkUserEmailaddress($email){
			// write query
			$sql = "SELECT * FROM users WHERE email_address = '$email'";

			// run the query
			$result = $this->dbconnect->query($sql);

			if ($this->dbconnect->affected_rows == 1) {
				// return true;
				$errors['email'] = "Email already exists!";
			}
			else{
				// return false;
				$_SESSION['errormsg'] = "Could not register user!";
			}
		}


		// update user
		public function updateUser($fullname, $profilename, $phone, $email, $usersid){
			// write the update query
			$sql = "UPDATE users SET fullname='$fullname', profile_name='$profilename', phone_no='$phone', email_address='$email', address='$address' WHERE users_id='$usersid'";

			// run the query
			$result = $this->dbconnect->query($sql);

			$output = array();
			if ($this->dbconnect->affected_rows==1) {
				$output['success'] = "Member details was successfully updated";
			}
			elseif ($this->dbconnect->affected_rows==0) {
				$output['success'] = "No changes made!";
			}
			else{
				$output['error'] = "Oops! someting happened.".$this->dbconnect->error;
			}
			return $output;
		}


	// admin login
	function adminlogin($username, $password){
		// $password = md5($password);

		// write the query
		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

		// run the query
		$result = $this->dbconnect->query($sql);
		$row = $result->fetch_assoc();

		// check for error
		if (!empty($this->dbconnect->error)) {
			echo "Connection error, please try again".$this->dbconnect->error;
		}

		if ($this->dbconnect->affected_rows > 0) {
			return $row;
		}
		else{
			return false;
		}

	}


	// get admin details
	public function getAdminDetails() {;
		// write the query
		$sql = "SELECT * FROM admin";

		// run the query
		$result = $this->dbconnect->query($sql);

		$rows = array();
		if ($this->dbconnect->affected_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return $row;
		}

	}


	// get all users
	public function getallusers(){
		// write the query
		$sql = "SELECT * FROM users";

		// run the query
		$result = $this->dbconnect->query($sql);

		$rows = array();
		if ($this->dbconnect->affected_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return $row;
		}

	}


	// fetch a specific user based on the users_id
		public function getUser($usersid){
			// write the query
			$sql = "SELECT * FROM users WHERE users_id='$usersid'";

			// run the query
			$result = $this->dbconnect->query($sql);

			// fetch the row
			if ($this->dbconnect->affected_rows == 1) {
				return $result->fetch_assoc();
			}
			else{
				$row = array();
				return $row;
			}
		}



	// insert into adverts table
	
	public function postAds($fulladdress, $breedname, $contname, $contphone, $price, $age, $qty, $gender, $desc, $photo){
	$filename = $_FILES['photo']['name'];

	$filesize = $_FILES['photo']['size'];
	// $filename = $_FILES['photo']['name'];

	// validation
	if ($_FILES['photo']['error'] > 0) {
		echo "error";
		exit;
	}
	// file size validation
	if ($_FILES['photo']['size'] > 2097152) {
		die('File size should be less than 2MB');
	}

	// file type validation
	$extensions = array("png", "jpg", "gif", "svg", "jpeg");

	// get the file extension
	$file_ext = explode(".", $filename); // convert string to array
	$file_ext = end($file_ext); // get the last element of the array

	// check if the file extension is valid
	if (in_array(strtolower($file_ext), $extensions) === false) {
		echo "Invalid file format";
		exit;
	}

	// temporary filename
	$tmp_dir_filename = $_FILES['photo']['tmp_name'];

	// destination dir
	$targetdir = "uploads/";
	$destination = $targetdir.$filename;
	

	if (move_uploaded_file($tmp_dir_filename, $destination)) {
			// write the query
		$sql = "INSERT INTO adverts(full_address, breed_name, contact_name, contact_phonenumber, price, age, quantity, gender, description, photo) VALUES('$fulladdress', '$breedname', '$contname', '$contphone', '$price', '$age', '$qty', '$gender', '$desc', '$destination')";

		// run the query
		$result = $this->dbconnect->query($sql);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";

		// check for errors
		if (!empty($this->dbconnect->error)) {
			echo "Connection error, please try again!";
		}
		if ($this->dbconnect->affected_rows > 0) {
			return true;	
		}
		else{
			return false;
		}
	}
	
	}


	// fetch from adverts table
	public function displayAds(){

		// write the query
		$sql = "SELECT * FROM adverts ORDER BY rand() ";
		// run the query
		$result = $this->dbconnect->query($sql);
		// check for error
		if (!empty($this->dbconnect->error)) {
			echo "Connection error, please try again later!";
		}
		// create an empty array
		$rows = array();
		if ($this->dbconnect->affected_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return $row;
		}

	}


	public function displayAd($id_id){
		// write the query
		$sql = "SELECT * FROM adverts WHERE ads_id = '$id_id' ";
		//run the query
		$result = $this->dbconnect->query($sql);

		if ($ads = $result->fetch_assoc()) {

				// echo "<pre>";
				// print_r($ads);
				// echo "</pre>";
			return $ads;
		}
		else{
			return false;
		}

	}



		// addtocart
	function addToCart($breedname, $qty, $amount, $subtotal, $usersid){

		// write the query
		$sql = "INSERT INTO addcart(breed_name, quantity, amount, subtotal, users_id) VALUES('$breedname', '$qty', $amount '$subtotal', '$usersid')";

		// run the query
		$result = $this->dbconnect->query($sql);

			if ($cart = $result->fetch_assoc()) {

			// echo "<pre>";
			// print_r($cart);
			// echo "</pre>";
			return $cart;
		}
		else{
			return false;
		}

	}



	function displayCart($breedname, $qty, $amount, $subtotal){

		// write the query
		$sql = "SELECT * FROM addcart WHERE users_id = 'usersid'";

		// run the query
		$result = $this->dbconnect->query($sql);
		
		if ($dispcart = $result->fetch_assoc()) {

		// echo "<pre>";
		// print_r($dispcart);
		// echo "</pre>";
		return $dispcart;
		}
		else{
			return false;
		}

	}


	// upload profile photo and update profile name
		public function uploadPhoto($profilename, $usersid){

			// file variables
			$filename = $_FILES['profpix']['name'];
			$filetype = $_FILES['profpix']['type'];
			$file_tmp_name = $_FILES['profpix']['tmp_name'];
			$file_error = $_FILES['profpix']['error'];
			$filesize = $_FILES['profpix']['size'];

			// validation
			// $errors = array();
			if ($file_error > 0) {
				$error = "You have not selected a file for upload";
				return $error;
			}

			// check for file size
			if ($filesize > 2097152) {
				$error = "Image file size should be less than 2MB";
				return $error;
			}

			$extensions = array("gif", "png", "jpeg", "jpg", "svg");

			$file_ext = explode(".", $filename);
			$file_ext = end($file_ext);

			if (!in_array(strtolower($file_ext), $extensions)) {
				$error = $file_ext. "file format not supported!";
				return $error;
			}

			// upload image
			$folder = "userphoto/";
			$newfilename = time().rand().".".$file_ext;
			$destination = $folder.$newfilename;

			if (move_uploaded_file($file_tmp_name, $destination)) {
				// write sql query
				$sql = "UPDATE users SET profile_name = '$profilename', profile_pix = '$newfilename' WHERE users_id ='$usersid'";

				// run the query
				$result = $this->dbconnect->query($sql);

				if ($this->dbconnect->affected_rows == 1) {
					return true;
				}
				else{
					return "Oops! something happened ".$this->dbconnect->error;
				}
			}
		}








}


?>