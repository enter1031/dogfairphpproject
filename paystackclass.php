<?php
	# include constants file
	include_once('constants.php');

	# begin class user
	class Payment{
		// member variables/properties
		public $amount;
		public $emailaddress;
		public $dbconnect; // database connection handler

		// member method/functions
		public function __construct(){
			$this->dbconnect = new Mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbconnect->connect_error) {
				die("Connection Error: ".$dbconnect->connect_error);
			}
		}
		

		// initialize paystack transaction method
		public function initializePaystack($email, $amountpaid){
			$url = "https://api.paystack.co/transaction/initialize";
			$reference = "ITP".time().rand();
			$callbackurl = "http://localhost/dogfair/paystackcallback.php";

			$fields = [
				'email' => $email,
				'amount' => $amountpaid * 100,
				'reference' => $reference,
				'callback_url' => $callbackurl
			];
			$fields_string = http_build_query($fields);

			$secretkey = "sk_test_260f77a0547876265f4504f86e4daf35a81dbc52";

			// step 1: open connection, initialize curl session
			$ch = curl_init();

			// step 2: //set the url, number of POST vars, POST data
			  curl_setopt($ch,CURLOPT_URL, $url);
			  curl_setopt($ch,CURLOPT_POST, true);
			  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    "Authorization: Bearer $secretkey",
			    "Cache-Control: no-cache",
			));

			  //So that curl_exec returns the contents of the cURL; rather than echoing it
  				curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

  				// step 3: execute curl
  				$response = curl_exec($ch);

  				if (curl_error($ch)) {
  					echo curl_error($ch);
  				}

  				// step 4: close curl session
  				curl_close($ch);

  				// step 5: convert json to object
  				$result = json_decode($response);
  				return $result;
		}


		// insert payment transaction details
		public function insertTransactionDetails($usersid, $amountpaid, $reference){
			$paymentmode = "paystack";
			$paymentstatus = "pending";
			// $dueyear = 2021;
			$datepaid = date('Y-m-d h:i:s');
			$sql = "INSERT INTO orders_payment(users_id, payment_refno, payment_mode, payment_status, amount_paid, date_paid)VALUES('$usersid', '$reference', '$paymentmode', '$paymentstatus', '$amountpaid', '$datepaid')";

			$response = $this->dbconnect->query($sql);
			if ($this->dbconnect->affected_rows == 1) {
				return true;
			}
			else{
				return false;
			}
		}


		// verify paystack transaction
		public function verifyPaystack($reference){
			$url = "https://api.paystack.co/transaction/verify/".$reference;
			$secretkey = "sk_test_260f77a0547876265f4504f86e4daf35a81dbc52";

			// step 1: open connection
			$ch = curl_init();

			// step 2: set curl options
			curl_setopt($ch,CURLOPT_URL, $url);
			  curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "GET");
			  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    "Authorization: Bearer $secretkey",
			    "Cache-Control: no-cache",
			));

			  //So that curl_exec returns the contents of the cURL; rather than echoing it
  				curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  				curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); // ignore ssl certificate

  				// step 3: execute curl
  				$response = curl_exec($ch);

  				if (curl_error($ch)) {
  					echo curl_error($ch);
  				}

  				// step 4: close curl session
  				curl_close($ch);

  				// step 5: convert json to object
  				$result = json_decode($response);
  				return $result;
		}


		// update payment transaction details
		public function updateTransactionDetails($reference){

			$sql ="UPDATE orders_payment SET payment_status ='completed' WHERE payment_refno = '$reference'";

			$result = $this->dbconnect->query($sql);
			if ($this->dbconnect->affected_rows == 1) {
				return true;
			}
			else{
				return false;
			}
		}


	}
	# End payment class

?>