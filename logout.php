<?php
ob_start();
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("location:login.php"); // Redirecting To Login Page
}
ob_flush();
?>
