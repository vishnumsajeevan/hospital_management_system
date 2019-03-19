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
				<table cellpadding="5" cellspacing="5" style="width: 100%">
					<tr>
						<td style="width: 500px">&nbsp;</td>
						<td style="width: 210px">&nbsp;</td>
						<td style="width: 435px">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px"></td>
						<td style="width: 210px; height: 35px">Patient Name</td>
						<td style="width: 435px; height: 35px">
						<input name="pname" type="text" required="required">&nbsp;</td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px"></td>
						<td style="width: 210px; height: 35px">Age</td>
						<td style="width: 435px; height: 35px">
						<input name="age" type="number" required="required"></td>
						<td style="height: 35px"></td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="width: 210px; height: 35px">Mobile No</td>
						<td style="width: 435px; height: 35px">
						<input name="mobno" type="number" required="required"></td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="width: 210px; height: 35px">Preffered Doctor</td>
						<td style="width: 435px; height: 35px">
							<select name="pdoctor" style="width: 173px; height: 25px">
	                        <option>Any Doctor</option>
		                        <?php
								include("connect.php");
								$q="select dname from tb_doctor order by dname asc";
								$rese=mysql_query($q);
								while($val=mysql_fetch_array($rese))
									{
								?>
	                        <option><?php print $val[0]; ?></option>
		                        <?php
									}
								?>
	                        </select>
						</td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="width: 210px; height: 35px">Date of 
						Appointment</td>
						<td style="width: 435px; height: 35px">
						<input name="dat" type="date" required="required" style="width: 170px; height: 25px;"></td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="width: 210px; height: 35px">Disease</td>
						<td style="width: 435px; height: 35px">
						<textarea name="pdisease" style="height: 20px; width: 167px" cols="20" rows="1" required="required"></textarea></td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 20px"></td>
						<td style="width: 210px; height: 20px"></td>
						<td style="width: 435px; height: 20px">
						</td>
						<td style="height: 20px"></td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="height: 35px" colspan="2">Consultation Time : 
						8 AM to 12 PM &amp; 2 PM to 6 PM</td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px; height: 35px">&nbsp;</td>
						<td style="width: 210px; height: 35px">&nbsp;</td>
						<td style="width: 435px; height: 35px">
						<button type="submit" name="submit1" class="button"> Submit</button>&nbsp;</td>
						<td style="height: 35px">&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 500px">&nbsp;</td>
						<td style="width: 210px">&nbsp;</td>
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
		$pname=$_POST['pname'];
		$age=$_POST['age'];
		$mobno=$_POST['mobno'];
		$pdoctor=$_POST['pdoctor'];
		$adat=$_POST['dat'];
		$pdisease=$_POST['pdisease'];
		
		list($year,$month,$day)=split('[-]', $adat);
		$apdate="$day-$month-$year";

		date_default_timezone_set("Asia/Kolkata");
		$dat=date("d-m-Y");

		$q="select tno from tb_appointment where apdate='$apdate' order by apno desc";
		$rese=mysql_query($q);
		$array=mysql_fetch_row($rese);
		
		$tno=$array[0];
		if($tno=="")
		{
			$tno=1;
		}
		else
		{
			$tno=$tno+1;
		}

		$sql="insert into tb_appointment(pname,age,pmob,pdoctor,apdate,pdisease,currdate,tno,pstatus)values('$pname','$age','$mobno','$pdoctor','$apdate','$pdisease','$dat','$tno','0')";
		$result=mysql_query($sql);
		
		session_start();
		$_SESSION['tno']=$tno;
		$_SESSION['apdate']=$apdate;
		
		echo"<script>location.reload();window.location.href='token.php';</script>";
	}
?>