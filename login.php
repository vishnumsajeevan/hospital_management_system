<?php
	session_start();
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
			border-width: 0px;
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
							<a href="login.php" class="current-page-item">Login</a>
							<a href="appointment.php">Appointment</a>
							<a href="aboutus.php">About Us</a>
							<a href="contactus.php">Contact Us</a>
						</nav>
					</header>
				
				</div>
			</div>
		</div>
		<div id="main">
			<form method="post" action="">
				<table cellpadding="5" cellspacing="5" class="auto-style1" style="width: 100%">
					<tr>
						<td style="width: 530px">&nbsp;</td>
						<td style="width: 146px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 530px; height: 35px"></td>
						<td style="width: 146px; height: 35px">User Type</td>
						<td style="width: 435px; height: 35px">
						<select name="utype" style="width: 173px; height: 30px">
							<option>- Select Type -</option>
							<option>Admin</option>
					        <option>Doctor</option>
					        <option>Patient</option>
					        <option>Pharmacy</option>
					        <option>Laboratory</option>
					</select>&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 530px; height: 35px"></td>
						<td style="width: 146px; height: 35px">Username</td>
						<td style="width: 435px; height: 35px">
						<input name="uname" type="text" required="required">&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 530px; height: 35px"></td>
						<td style="width: 146px; height: 35px">Password</td>
						<td style="width: 435px; height: 35px">
						<input name="pass" type="password" required="required">&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 530px; height: 35px">&nbsp;</td>
						<td style="width: 146px; height: 35px">&nbsp;</td>
						<td style="width: 435px; height: 35px">
						<button type="submit" name="submit1" class="button"> Login</button>&nbsp;</td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 530px">&nbsp;</td>
						<td style="width: 146px">&nbsp;</td>
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
		$utype=$_POST['utype'];
		$u=$_POST['uname'];
		$p=$_POST['pass'];

		if($utype=="- Select Type -")
		{
			echo"<script>window.alert('Please select usertype');</script>";
		}
		else
		{
			//login process
			$qt="select * from tb_login where typ='$utype' and username='$u' and pass='$p'";
			$reset=mysql_query($qt);
			$nt=mysql_num_rows($reset);
			if($nt==1)
				{
				$d=mysql_fetch_row($reset);
				$unam=$d[1];
				$pass=$d[2];
				$typ=$d[3];
				$lastaccess=$d[4];
				$stat=$d[5];
				$block=$d[6];
				
				if($stat==1 && $block==0)
					{
					$_SESSION['username']=$unam;
					$_SESSION['typ']=$typ;
					$_SESSION['lastaccess']=$lastaccess;
					
					date_default_timezone_set("Asia/Kolkata");
					$dat=date("h:i A D d M Y");
					
					$sq2="update tb_login set lastaccess='$dat' where username='$unam' and typ='$typ'";
					$re2=mysql_query($sq2);
					
					if($typ=="Admin")
						 echo"<script>location.reload();window.location.href='admin/adminhome.php';</script>";
					else if($typ=="Doctor")
						 echo"<script>location.reload();window.location.href='doctor/doctorhome.php';</script>";
					else if($typ=="Patient")
						 echo"<script>location.reload();window.location.href='patient/patienthome.php';</script>";
					else if($typ=="Pharmacy")
						 echo"<script>location.reload();window.location.href='pharmacy/pharmacyhome.php';</script>";
					else if($typ=="Laboratory")
						 echo"<script>location.reload();window.location.href='lab/labhome.php';</script>";
					else
						 echo"<script>window.alert('Invalid User');</script>";
					}
				else if($stat==1 && $block==1)
					echo"<script>window.alert('You are blocked by the admin');</script>";
				else
					echo"<script>window.alert('You are not allowed');</script>";
				}
			else
				echo"<script>window.alert('Invalid username or password');</script>";
		}
	}
?>