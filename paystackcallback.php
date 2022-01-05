<?php
var_dump($_REQUEST);
include("paystackclass.php");

$payobj = new Payment;
$output = $payobj->verifyPaystack($_REQUEST['reference']);

if ($output->data->status === 'success') {
	$updatetrans = $payobj->updateTransactionDetails($_REQUEST['reference']);

	// var_dump($updatetrans);
	
	if ($updatetrans === true) {
		
		header("Location: index.php");
		exit;
	}
	else{
		header("Location: index.php");
		exit;
	}
}

// echo "<pre>";
// print_r($output);
// echo "</pre>";

?>