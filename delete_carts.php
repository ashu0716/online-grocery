<?php
include("connection.php");
session_start();
$uname=$_SESSION['uname'];
$clint=$_SESSION['clint_id'];

$crt_id=$_GET['crt_id'];
if($crt_id!=NULL)
{
	$delete_carts="delete from cart where crt_id='$crt_id'  and clint_id='$clint' ";
	$query_carts=mysqli_query($conn,$delete_carts)or die(mysqli_error());
		if($query_carts)
			{
				echo "<script> alert('Your Product Removed From Cart !! '); </script>";
			}
header("Location: " . $_SERVER['HTTP_REFERER']."");
}
?>