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
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="adminhome.php">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 30px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php print $lastaccess; ?> &nbsp; <a href="../logout.php" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="adminhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-edit fa-3x"></i> Forms<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="doctorform.php">Doctor</a>
                            </li>
                            <li>
                                <a href="patientform.php">Patient</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-sitemap fa-3x"></i> View Details<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="viewdoctor.php">Doctor</a>
                            </li>
                            <li>
                                <a href="#">Patient<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="viewinpatient.php">In-patient</a>
                                    </li>
                                    <li>
                                        <a href="viewoutpatient.php">Out-patient</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>
                    <li>
                        <a  href="viewnotifications.php"><i class="fa fa-qrcode fa-3x"></i> View Notifications</a>
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
                     <h2>View Details</h2>   
                        <h5>Welcome Admin, Love to see you back.</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Out-Patient Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             <form role="form" name="form1" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                
		                                <?php
											include("../connect.php");
											$id=$_GET['id'];
											$sql="select * from tb_patient where pid='$id' and pstatus='1'";
											$result=mysql_query($sql);
											$val=mysql_fetch_array($result);
										?>
										
                                    
                                    	<div class="form-group">
                                            <label></label>
                                            <img src="<?php print $val[7]; ?>" width="130" height="130">
                                        </div>
                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <input class="form-control" value="<?php print $val[1]; ?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Patient Id</label>
                                            <input class="form-control" value="<?php print $val[2]; ?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input value="<?php print $val[3]; ?>" class="form-control" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input value="<?php print $val[4]; ?>" class="form-control" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <input value="<?php print $val[5]; ?>" class="form-control" disabled />
                                        </div>
                                    <br />
    							</div>
                                <div class="col-md-6">
                                		<div class="form-group">
                                            <label>Disease</label>
                                            <textarea class="form-control" rows="3" disabled><?php print $val[6]; ?></textarea>
                                        </div>
                                		<div class="form-group">
                                            <label>Consulting Doctor</label>
                                            <input class="form-control" value="<?php print $val[8]; ?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Room No / Ward No</label>
                                            <input class="form-control" value="<?php print $val[9]; ?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea class="form-control" rows="3" disabled><?php print $val[10]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input class="form-control" value="<?php print $val[11]; ?>" disabled />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input class="form-control" value="<?php print $val[12]; ?>" disabled >
                                        </div>
                                        
                                        <button type="submit" name="submit1" class="btn btn-warning"><i class="fa fa-pencil"></i> Delete</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

<?php
		if(isset($_POST['submit1']))
		{
				include("../connect.php");
				$pid=$val[2];
				
				$sql4="delete from  tb_patient where pid='$pid' and pstatus='1'";
				$res4=mysql_query($sql4);
								
				echo"<script>window.alert('Deleted');</script>";
				echo "<script>location.reload();window.location.href='viewoutpatient.php';</script>";
		}
?>