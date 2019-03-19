<?php
	include("../connect.php");
	$nam=$_GET['nam'];
	$email=$_GET['email'];
	$msg=$_GET['msg'];

	$sql4="delete from  tb_contactus where mname='$nam' and email='$email' and msg='$msg'";
	$res4=mysql_query($sql4);
	
	echo"<script>window.alert('Message deleted');</script>";
   	echo "<script>window.location.href='viewnotifications.php'</script>";
?>
