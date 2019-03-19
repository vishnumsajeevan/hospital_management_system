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
     
        <!-- CUSTOM STYLES-->
    <link href="../admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="../admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	  <style type="text/css">
	  .auto-style1 {
		  text-align: center;
	  }
	  </style>
   
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
                        <a  href="doctorhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="doctorprofile.php"><i class="fa fa-edit fa-3x"></i> Profile</a>
                    </li>
                    <li>
                        <a class="active-menu" href="viewpatients.php"><i class="fa fa-qrcode fa-3x"></i> View Patients</a>
                    </li>
                    <li>
                        <a href="viewappointments.php"><i class="fa fa-table fa-3x"></i> View Appointments</a>
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
                     <h2>View Patients </h2>   
                        <h5>Welcome <?php print $array[1]; ?>, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Patients List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="auto-style1">SL No</th>
                                            <th class="auto-style1">Photo</th>
                                            <th class="auto-style1">Patient Name</th>
                                            <th class="auto-style1">Patient Id</th>
                                            <th class="auto-style1">Age</th>
                                            <th class="auto-style1">Gender</th>
                                            <th class="auto-style1">Disease</th>
                                            <th class="auto-style1">Mobile No</th>
                                            <th class="auto-style1">Prescribe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											include("../connect.php");
											
											date_default_timezone_set("Asia/Kolkata");
											$dat1=date("d-m-Y");
											
											$i=1;
											$q="select * from tb_patient where pdoctor='$dname' and pstatus='0'";
											$rese=mysql_query($q);
											while($val=mysql_fetch_array($rese))
												{
										?>
                                        <tr>
                                            <td class="auto-style1"><?php print $i; $i=$i+1; ?></td>
                                            <td class="auto-style1"><img src="../admin/<?php print $val[7]; ?>" width="60" height="60"></td>
                                            <td class="auto-style1"><?php print $val[1]; ?></td>
                                            <td class="auto-style1"><?php print $val[2]; ?></td>
                                            <td class="auto-style1"><?php print $val[3]; ?></td>
                                            <td class="auto-style1"><?php print $val[5]; ?></td>
                                            <td class="auto-style1"><?php print $val[6]; ?></td>
                                            <td class="auto-style1"><?php print $val[11]; ?></td>
                                            <td class="text-left auto-style1">
                                            <a href="prescribe.php?nam=<?php print $val[1]; ?>&id=<?php print $val[2]; ?>">
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Prescribe</button>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="../admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../admin/assets/js/custom.js"></script>

</body>
</html>
