<?php
		session_start();
		$tno=$_SESSION['tno'];
		$apdate=$_SESSION['apdate'];
		
		include("connect.php");
		$q1="select * from tb_appointment where tno='$tno' and apdate='$apdate'";
		$rese1=mysql_query($q1);
		$array=mysql_fetch_row($rese1);
?>
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
		<style type="text/css">
		.auto-style1 {
			border-style: solid;
			border-width: 2px; margin-left:350px;
		}
		.auto-style2 {
			text-align: center;
		}
		</style>
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
							<a href="appointment.php" class="current-page-item">Appointment</a>
							<a href="aboutus.php">About Us</a>
							<a href="contactus.php">Contact Us</a>
						</nav>
					</header>
				
				</div>
			</div>
		</div>
		<div id="main">
			<form method="post" action="">
				<table cellpadding="5" cellspacing="5" class="auto-style1" style="width: 50%">
					<tr>
						<td style="width: 350px">&nbsp;</td>
						<td style="width: 300px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
					</tr>
					<tr>
						<td style="height: 20px; width: 350px;"></td>
						<td style="height: 20px" colspan="2"></td>
					</tr>
					<tr>
						<td style="height: 35px" class="auto-style2" colspan="3"><h3>TOKEN NO : <?php print $array[8]; ?></h3></td>
					</tr>
					<tr>
						<td style="height: 20px; width: 350px;"></td>
						<td style="height: 20px" colspan="2"></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;"></td>
						<td style="width: 300px; height: 35px">Patient Name</td>
						<td style="width: 435px; height: 35px">
						<?php print $array[1]; ?></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;"></td>
						<td style="width: 300px; height: 35px">Age</td>
						<td style="width: 435px; height: 35px">
						<?php print $array[2]; ?></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;">&nbsp;</td>
						<td style="width: 300px; height: 35px">Mobile No</td>
						<td style="width: 435px; height: 35px">
						<?php print $array[3]; ?></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;">&nbsp;</td>
						<td style="width: 300px; height: 35px">Preffered Doctor</td>
						<td style="width: 435px; height: 35px">
							<?php print $array[4]; ?></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;">&nbsp;</td>
						<td style="width: 300px; height: 35px">Date of 
						Appointment</td>
						<td style="width: 435px; height: 35px">
						<?php print $array[5]; ?></td>
					</tr>
					<tr>
						<td style="height: 35px; width: 350px;">&nbsp;</td>
						<td style="width: 300px; height: 35px">Disease</td>
						<td style="width: 435px; height: 35px">
						<?php print $array[6]; ?></td>
					</tr>
					<tr>
						<td style="height: 20px; width: 350px;"></td>
						<td style="width: 300px; height: 20px"></td>
						<td style="width: 435px; height: 20px">
						</td>
					</tr>
					<tr>
						<td style="height: 35px" class="auto-style2" colspan="3">Consultation Time : 
						8 AM to 12 PM &amp; 2 PM to 6 PM</td>
					</tr>
					<tr>
						<td style="height: 35px" class="auto-style2" colspan="3">Please print / save 
						this token &amp; bring this token during consultation.</td>
					</tr>
					<tr>
						<td class="auto-style2" colspan="3">
						<button type="submit" name="submit1" class="button" onclick="window.print()"> Print</button>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 350px">&nbsp;</td>
						<td style="width: 300px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
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