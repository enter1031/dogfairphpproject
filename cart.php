<?php session_start();
include "dogfairclasses.php";

if (!isset($_SESSION['email'])) {
		include("mainheader.php");
}
else{
	include("userdashboardheader.php");
}		
			

?>

	


<?php
include("mainfooter.php");

?>
