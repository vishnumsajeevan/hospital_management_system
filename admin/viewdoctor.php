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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	  <style type="text/css">
	  .auto-style1 {
		  text-align: center;
	  }
	  </style>
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
                     <h2>View Details </h2>   
                        <h5>Welcome Admin, Love to see you back.</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Doctors List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="auto-style1">SL No</th>
                                            <th class="auto-style1">Photo</th>
                                            <th class="auto-style1">Doctor Name</th>
                                            <th class="auto-style1">Doctor Id</th>
                                            <th class="auto-style1">Degree</th>
                                            <th class="auto-style1">Department</th>
                                            <th class="auto-style1">Mobile No</th>
                                            <th class="auto-style1">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											include("../connect.php");
											$i=1;
											$q="select * from tb_doctor order by dno desc";
											$rese=mysql_query($q);
											while($val=mysql_fetch_array($rese))
												{
										?>
                                        <tr>
                                            <td class="auto-style1"><?php print $i; $i=$i+1; ?></td>
                                            <td class="auto-style1"><img src="<?php print $val[6]; ?>" width="60" height="60"></td>
                                            <td class="auto-style1"><?php print $val[1]; ?></td>
                                            <td class="auto-style1"><?php print $val[2]; ?></td>
                                            <td class="auto-style1"><?php print $val[5]; ?></td>
                                            <td class="auto-style1"><?php print $val[7]; ?></td>
                                            <td class="auto-style1"><?php print $val[9]; ?></td>
                                            <td class="auto-style1">
                                            <a href="editdoctor.php?id=<?php print $val[2]; ?>">
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            </a>
											</td>
                                        </tr>
                                        <?php
							            		}
										?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
