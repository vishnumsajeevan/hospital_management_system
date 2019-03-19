<!DOCTYPE HTML>
<html>
	<head>
		<title>Hospital Management System</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--5grid--><script src="css/5grid/viewport.js"></script><!--[if lt IE 9]><script src="css/5grid/ie.js"></script><![endif]--><link rel="stylesheet" href="css/5grid/core.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
		</head>
	<body>
	<!-- ********************************************************* -->
		<div id="header-wrapper">
			<div class="5grid">
				<div class="12u-first">
					
					<header id="header">
						<nav>
							<a href="index.html">Home</a>
							<a href="login.php">Login</a>
							<a href="appointment.php">Appointment</a>
							<a href="aboutus.php">About Us</a>
							<a href="contactus.php" class="current-page-item">Contact Us</a>
						</nav>
					</header>
				
				</div>
			</div>
		</div>
		<div id="main">
			<form method="post" action=""><table cellpadding="5" cellspacing="5" class="auto-style1" style="width: 100%">
					<tr>
						<td style="width: 570px">&nbsp;</td>
						<td style="width: 110px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 570px; height: 35px"></td>
						<td style="width: 110px; height: 35px">Name</td>
						<td style="width: 435px; height: 35px">
						<input name="name" type="text" required="required"></td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 570px; height: 35px"></td>
						<td style="width: 110px; height: 35px">Your Email</td>
						<td style="width: 435px; height: 35px">
						<input name="email" type="email" required="required">&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 570px; height: 35px"></td>
						<td style="width: 110px; height: 35px">Message</td>
						<td style="width: 435px; height: 35px">
						<textarea name="msg" rows="4" style="width: 170px" required="required"></textarea>&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 570px; height: 35px">&nbsp;</td>
						<td style="width: 110px; height: 35px">&nbsp;</td>
						<td style="width: 435px; height: 35px">
						<button type="submit" name="submit1" class="button"> Send</button>&nbsp;</td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 570px">&nbsp;</td>
						<td style="width: 110px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="footer-wrapper">
			<div class="5grid">
				
				<div class="12u-first">

					<div id="copyright">
						&copy; 2019 All rights reserved. Designed by Vishnu M S
					</div>

				</div>
			</div>
		</div>
	<!-- ********************************************************* -->
	</body>
</html>
<?php
	if(isset($_POST['submit1']))
	{
		include("connect.php");
		$name=$_POST['name'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];
		
		date_default_timezone_set("Asia/Kolkata");
		$dat=date("d-m-Y");
		
		$sql="insert into tb_contactus(mname,email,msg,mdate,mstatus)values('$name','$email','$msg','$dat','0')";
		$result=mysql_query($sql);
		
		echo"<script>window.alert('Message sent');</script>";
	}
?>