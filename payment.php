<?php session_start();
include("dogfairclasses.php");
include("paystackclass.php");

if (!isset($_SESSION['email'])) {
    include("mainheader.php");
    header('Location:login.php');
    exit;
}
else{
  include("userdashboardheader.php");
}


  // echo "<pre>";
  //   var_dump($_SESSION);
  // echo "</pre>";
?>

  <!-- Page Content -->
  <div class="container" style='min-height:200px'>
    <div class="jumbotron shadow mt-5 bg-success">
      <h1 class="display-4">Payment</h1>
      <p class="lead text-white">Welcome! <?php echo $_SESSION['fullname']; ?></p>
      <hr class="my-4">
      <form method="post" action="" class="form-inline">
      <!-- <label>&#8358;2,000.00</label> -->
      <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
      <input type="text" name="amountpaid" placeholder="Enter amount" id="amt1" value="" class="form-control">
      <!-- <input type="hidden" name="amountpaid" id="amt2" value="3000"> -->
      <input type="submit" name="submit" class="btn btn-warning mx-3" value="Pay Now">
    </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // create payment object
      $payobj = new Payment;
      // use initializePaystack method
      $output = $payobj->initializePaystack($_POST['email'], $_POST['amountpaid']);

        // echo "<pre>";
        // print_r($output->data->authorization_url);
        // echo "</pre>";

        // redirect to paystack
        $redirecturl = $output->data->authorization_url;
        $reference = $output->data->reference;

        // insert transaction details & redirect to paystack
        if (!empty($redirecturl)) {
          $payobj->insertTransactionDetails($_SESSION['userid'], $_POST['amountpaid'], $reference);

          $check = $payobj->insertTransactionDetails($_SESSION['userid'], $_POST['amountpaid'], $reference);
          echo $check;
          header("Location: $redirecturl");
          exit;
        }
        

    }
    

    ?>

    

  </div>
  <!-- /.container -->

<?php
include('mainfooter.php');

?>