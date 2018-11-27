<?php
  require_once('vendor/autoload.php');
  \Stripe\Stripe::setApiKey("sk_test_Bt6wTtStd9s848cNkkBkCZby");
  // Sanitize POST Array
  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
  $first_name = $POST['first_name'];
  $last_name = $POST['last_name'];
  $email = $POST['email'];
  $token = $POST['stripeToken'];
  $photo_id = $POST['photo_id'];
  echo $photo_id;
  // Create Customer In Stripe
  $customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
  ));
  // Charge Customer
  $charge = \Stripe\Charge::create(array(
    "amount" => 50,
    "currency" => "usd",
    "description" => "PABLO Stylized Image",
    "customer" => $customer->id
  ));
  //Do database stuff
  require_once('session.php');
  $sql = "INSERT INTO Orders (email, photo_id, order_date, price) " 
    . "VALUES ('".$_SESSION['login_user']."', '$photo_id', "
    ."current_timestamp, 50);";
  echo $sql ."<br>";
  $result = pg_query($conn, $sql);

  // Redirect to success
  header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&photo_id='.$photo_id);
?>