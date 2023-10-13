<?php
include("connection.php");
session_start();
$uname=$_SESSION['uname'];
$clint=$_SESSION['clint_id'];


$crt_id=$_GET['crt_id'];

$qty_update=$_GET['product_quantity'];	
		
if($qty_update==0)
	{
		$delete_delete_cart="delete from cart where crt_id='$crt_id' ";
	$query_delete_cart=mysqli_query($conn,$delete_delete_cart)or die(mysqli_error());
		if($query_delete_cart)
			{
				echo "<script> alert('Your Product Removed From Cart !! '); </script>";
			}
	}
	else
	{
	$update_cart="update cart set qty='$qty_update' where crt_id='$crt_id' and clint_id='$clint' ";
	$query_update_cart=mysqli_query($conn,$update_cart)or die(mysqli_error());
		if($query_carts)
			{
				echo "<script> alert('Your Product Updated into  Cart !! '); </script>";
			}
	}
header("Location: " .$_SERVER['HTTP_REFERER']."");
?>
