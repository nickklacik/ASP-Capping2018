<?php
  require_once('vendor/autoload.php');
  \Stripe\Stripe::setApiKey("sk_test_Bt6wTtStd9s848cNkkBkCZby");
  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
  $first_name = $POST['first_name'];
  $last_name = $POST['last_name'];
  $email = $POST['email'];
  $token = $POST['stripeToken'];
  $photo_id = $POST['photo_id'];
  
  // Create Customer In Stripe
  $customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
  ));
  
  // Charge Customer
  $charge = \Stripe\Charge::create(array(
    "amount" => 50,
    "currency" => "usd",
    "description" => "Pablo Style order",
    "customer" => $customer->id
  ));
  
  // Create Order Record
  require_once('session.php');
  $sql = "INSERT INTO Orders (email, photo_id, order_date) " 
    . "VALUES ('".$_SESSION['login_user']."', '$photo_id', "
    ."current_timestamp);";
  $result = pg_query($conn, $sql);
  
  // Get watermark file path
  $sql = "SELECT preview_path FROM Photos WHERE photo_id = $photo_id;";
  $result = pg_query($conn, $sql);
  $watermark = pg_fetch_row($result)[0];
  $watermark = "/var/www/" . substr($watermark, 3); // Get absolute file path
  unlink($watermark); // Delete watermark
  $sql = "UPDATE photos SET preview_path = 'removed' WHERE photo_id = $photo_id";
  $result = pg_query($conn, $sql); // Update photo record

  // Redirect to success page
  header('Location: success.php?product='.$charge->description);
?>