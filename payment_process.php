<?php
session_start();
include('connections.php');

if(isset($_POST['amount']) && isset($_POST['name']) && isset($_POST['contact_name']) && isset($_POST['email'])) {
  $amt = $_POST['amount'];
  $name = $_POST['name'];
  $contact_name = $_POST['contact_name'];
  $email = $_POST['email'];
  $payment_status = "pending";
  $added_on = date('Y-m-d h:i:s');
  mysqli_query($conn, "INSERT INTO payment(amount, name, contact, email, payment_status, added_on) VALUES('$amt', '$name', '$contact_name', '$email', '$payment_status', '$added_on')");
  $_SESSION['OID'] = mysqli_insert_id($conn);
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>