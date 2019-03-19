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
							<a href="aboutus.php" class="current-page-item">About Us</a>
							<a href="contactus.php">Contact Us</a>
						</nav>
					</header>
				
				</div>
			</div>
		</div>
		<div id="main">
			<section style="width: 700px;margin-left:500px">
							<h2>about us</h2>
							<ul class="small-image-list">
								<li>
									<a href="#"><img src="admin/assets/img/find_user.png" width="78" height="78" alt="" class="left" /></a>
									<h4>Vishnu M S</h4>
									<p>student of vidya academy of science and technology</p>
								</li>
							</ul>
						</section>

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