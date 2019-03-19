<?php
	include("../connect.php");
	$nam=$_GET['nam'];
	$mobno=$_GET['mobno'];
	$dname=$_GET['dname'];

	$sq1="update tb_appointment set pstatus='1' where pname='$nam' and pmob='$mobno' and pdoctor='$dname'";
	$re1=mysql_query($sq1);
	
	echo"<script>window.alert('Appointment of $nam is verified');</script>";
   	echo "<script>window.location.href='viewappointments.php'</script>";
?>
