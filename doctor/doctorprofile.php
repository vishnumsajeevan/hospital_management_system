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
		?>
        
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../admin/<?php print $array[6]; ?>" class="ph img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="doctorhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="doctorprofile.php"><i class="fa fa-edit fa-3x"></i> Profile</a>
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
                     <h2>Profile</h2>   
                        <h5>Welcome <?php print $array[1]; ?>, Love to see you back.</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your Profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             <form role="form" name="form1" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Name</label>
                                            <input class="form-control" value="<?php print $array[1]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Doctor Id</label>
                                            <input class="form-control" value="<?php print $array[2]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input class="form-control" value="<?php print $array[3]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
	                                            <label>Gender</label>
	                                            <input class="form-control" value="<?php print $array[4]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input class="form-control" value="<?php print $array[5]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        
                                    <br />
    							</div>
                                <div class="col-md-6">
                                		<div class="form-group">
                                            <label>Department</label>
                                            <input class="form-control" value="<?php print $array[7]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea class="form-control" rows="5" id="disabledInput" disabled ><?php print $array[8]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input class="form-control" value="<?php print $array[9]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="<?php print $array[10]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h3>More Customization</h3>
                         <p>
                        For any correction in your profile details, please contact the admin.
                        </p>
                    </div>
                </div>
                <!-- /. ROW  -->
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
