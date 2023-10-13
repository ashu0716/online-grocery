<?php
date_default_timezone_set('Asia/Kolkata');

include("connection.php");

session_start();
$uname=$_SESSION['uname'];
$clint=$_SESSION['clint_id'];

if($uname==NULL & $clint==NULL)
{	
	header("location:login.php");
}

	$pid_cart=$_GET['crt_id'];

	$select_carts="select * from cart where pid='$pid_cart' and clint_id='$clint' and crt_status='Pending'  ";
	$query_select_cart=mysqli_query($conn,$select_carts)or die(mysqli_error());
 	$fetch_select_cart=mysqli_fetch_array($query_select_cart);
	
	$rows_select_cart=mysqli_num_rows($query_select_cart);
			
			$qty_a=$fetch_select_cart['qty'];
			$qty_update=$qty_a + 1;
			if($rows_select_cart > 0)
					{		
						$update_cart="update cart set qty='$qty_update' where pid='$pid_cart' ";
						$query_update_cart=mysqli_query($conn,$update_cart)or die(mysqli_error());
					}
					else
					{
						$qty=1;
						$cart_status="Pending";
						$date_cart=date("j F Y H:i:s", time());
			
						$insert_carts="insert into cart values ('','$clint','$pid_cart','$qty','$date_cart','$cart_status')";
						$query_carts=mysqli_query($conn,$insert_carts) or die(mysqli_error());
					}
					
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>