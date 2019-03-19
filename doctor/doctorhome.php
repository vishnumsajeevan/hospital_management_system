<?php
	session_start();
	$uname=$_SESSION['username'];
	$type=$_SESSION['typ'];
	$lastaccess=$_SESSION['lastaccess'];
	
	if(empty($_SESSION))
		{
		header("location:../index.html");
		}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Management System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <style type="text/css">.ph{ height:170px;width:170px;margin: 25px auto;border-radius: 100px; }</style>
   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="doctorhome.php">Doctor</a> 
            </div>
  <div style="color: white;padding: 15px 30px 5px 50px;float: right;
font-size: 16px;"> Last access : <?php print $lastaccess; ?> &nbsp; <a href="../logout.php" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>
        
        <?php
        	include("../connect.php");
		    $sql1="select * from tb_doctor where did='$uname'";
			$res=mysql_query($sql1);
			$array=mysql_fetch_row($res);
			
			$dname=$array[1];
		?>
        
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../admin/<?php print $array[6]; ?>" class="ph img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="doctorhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="doctorprofile.php"><i class="fa fa-edit fa-3x"></i> Profile</a>
                    </li>
                    <li>
                        <a  href="viewpatients.php"><i class="fa fa-qrcode fa-3x"></i> View Patients</a>
                    </li>
                    <li>
                        <a  href="viewappointments.php"><i class="fa fa-table fa-3x"></i> View Appointments</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop fa-3x"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="changepassword.php">Change Password</a>
                            </li>
                        </ul>
                    </li>  

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Doctor Dashboard</h2>   
                        <h5>Welcome <?php print $array[1]; ?>, Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
<?php
	include("../connect.php");

	date_default_timezone_set("Asia/Kolkata");
	$dat1=date("d-m-Y");
	
	$qt2="select count(*) from tb_appointment where apdate='$dat1' and pdoctor='$dname'";
	$reset2=mysql_query($qt2);
	$d2=mysql_fetch_row($reset2);
	
	$qt="select count(*) from tb_patient where pdoctor='$dname'";
	$reset=mysql_query($qt);
	$d=mysql_fetch_row($reset);
	
?>
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php print $d2[0]; ?></p>
                    <p class="text-muted">Appointment</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php print $d[0]; ?></p>
                    <p class="text-muted">Patients</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">24 x 7</p>
                    <p class="text-muted">Working</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">10 Years</p>
                    <p class="text-muted">experience</p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->

	<!--Map Section -->
	    <section>
	    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3922.702614039853!2d76.21462441446639!3d10.524072666679379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7ee4ecfdd33d3%3A0x395137b1f7531135!2sGovt+General+Hospital+Thrissur!5e0!3m2!1sen!2sin!4v1552489473840" width="1010" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>
	<!--End Map Section -->

    </div>
             <!-- /. PAGE INNER  -->
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../admin/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../admin/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../admin/assets/js/custom.js"></script>
    
   
</body>
</html>
