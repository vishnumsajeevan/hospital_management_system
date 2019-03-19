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
                            Edit In-Patient Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             <form role="form" name="form1" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                
		                                <?php
											include("../connect.php");
											$id=$_GET['id'];
											$sql="select * from tb_patient where pid='$id' and pstatus='0'";
											$result=mysql_query($sql);
											$val=mysql_fetch_array($result);
										?>
										
                                    
                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <input class="form-control" name="pname" value="<?php print $val[1]; ?>" placeholder="Enter Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Patient Id</label>
                                            <input class="form-control" value="<?php print $val[2]; ?>" id="disabledInput" type="text" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input name="age" value="<?php print $val[3]; ?>" class="form-control" placeholder="Enter Age" />
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input name="pdob" value="<?php print $val[4]; ?>" class="form-control" placeholder="dd-mm-yyyy" />
                                        </div>
                                        <div class="form-group">
	                                            <label>Gender</label>
	                                            <?php
	                                                	$gen=$val[5];
	                                                	if($gen=="Male")
	                                                	{
	                                            ?>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Male" checked /> Male
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Female"/> Female
                                                </label>
                                                <?php
	                                                    }
	                                                    else
	                                                    {
                                                ?>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Male" /> Male
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Female" checked/> Female
                                                </label>
                                                <?php
	                                                    }
                                                ?>
                                        </div>
                                        <div class="form-group">
                                            <label></label>
                                            <img src="<?php print $val[7]; ?>" width="130" height="130">
                                        </div>
                                        <div class="form-group">
                                            <label>Change Photo</label>
                                            <input type="file" name="file1" />
                                        </div>
                                    <br />
    							</div>
                                <div class="col-md-6">
                                		<div class="form-group">
                                            <label>Disease</label>
                                            <textarea class="form-control" name="pdisease" rows="3"><?php print $val[6]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Consulting Doctor</label>
                                            <select class="form-control" name="pdoctor">
                                            	<option><?php print $val[8]; ?></option>
                                            	<?php
													include("../connect.php");
													$q1="select dname from tb_doctor order by dname asc";
													$rese1=mysql_query($q1);
													while($val1=mysql_fetch_array($rese1))
														{
												?>
                                                <option><?php print $val1[0]; ?></option>
                                                <?php
									            		}
												?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Room No / Ward No</label>
                                            <input class="form-control" name="proom" value="<?php print $val[9]; ?>" placeholder="Enter Room No / Ward No" />
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea class="form-control" name="paddress" rows="3"><?php print $val[10]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" name="pmob" value="<?php print $val[11]; ?>" class="form-control" placeholder="Enter Mobile No" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" name="pemail" value="<?php print $val[12]; ?>" class="form-control" placeholder="Enter Email Id">
                                        </div>
                                        
                                        <button type="submit" name="submit1" class="btn btn-primary"><i class=" fa fa-refresh "></i> Update</button>
                                        <button type="submit" name="submit3" class="btn btn-warning"><i class="fa fa-pencil"></i> Discharge</button>
                                        <button type="submit" name="submit2" class="btn btn-info"><i class="fa fa-pencil"></i> Delete</button>
                                        <button type="reset" class="btn btn-success">Reset All</button>

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
				$name=$_POST['pname'];
				$age=$_POST['age'];
				$dob=$_POST['pdob'];		
				$gender=$_POST['pgender'];
				$pdisease=$_POST['pdisease'];
				$pdoctor=$_POST['pdoctor'];
				$proom=$_POST['proom'];
				$address=$_POST['paddress'];
				$mob=$_POST['pmob'];
				$email=$_POST['pemail'];

				$img=$_FILES['file1']['name'];
				if($img!="")
				{
					$split=explode('.',strtolower($img));//image split
					$extension=end($split);
					$path="patient_photo/".$pid.".".$extension;
					move_uploaded_file($_FILES['file1']['tmp_name'],$path);
				}
				else
				{
					$path=$val[7];
				}
							
				$sql1="update tb_patient set pname='$name',age='$age',pdob='$dob',pgender='$gender',pdisease='$pdisease',path='$path',pdoctor='$pdoctor',proom='$proom',paddress='$address',pmob='$mob',pemail='$email' where pid='$pid'";
				$result1=mysql_query($sql1);
				echo"<script>window.alert('Updated');</script>";
				echo "<script>location.reload();window.location.href='viewinpatient.php';</script>";
		}
		
		if(isset($_POST['submit2']))
		{
				include("../connect.php");
				$pid=$val[2];
				
				$sql3="delete from  tb_login  where username='$pid'";
				$res3=mysql_query($sql3);
				
				$sql4="delete from  tb_patient where pid='$pid'";
				$res4=mysql_query($sql4);
								
				echo"<script>window.alert('Deleted');</script>";
				echo "<script>location.reload();window.location.href='viewinpatient.php';</script>";
		}
		if(isset($_POST['submit3']))
		{
				include("../connect.php");
				$pid=$val[2];
				
				$sql5="update tb_patient set pstatus='1' where pid='$pid'";
				$result2=mysql_query($sql5);
				
				$sql6="delete from  tb_login  where username='$pid'";
				$res6=mysql_query($sql6);
				
				echo"<script>window.alert('Patient Discharged');</script>";
				echo "<script>location.reload();window.location.href='viewinpatient.php';</script>";
		}
?>