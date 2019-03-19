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
                        <a class="active-menu" href="#"><i class="fa fa-edit fa-3x"></i> Forms<span class="fa arrow"></span></a>
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
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> View Details<span class="fa arrow"></span></a>
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
                     <h2>Form Page</h2>   
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
                            Patient Registration Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" name="form1" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <input class="form-control" name="pname" placeholder="Enter Name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Patient Id</label>
                                            <input class="form-control" name="pid" placeholder="Enter Id" />
                                        </div>
                                        <div class="form-group">
	                                        <label>Age</label>
	                                        <input class="form-control" name="age" placeholder="Enter Age" />
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input name="pdob" class="form-control" placeholder="dd-mm-yyyy" />
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Male" checked /> Male
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="pgender" value="Female"/> Female
                                                </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Disease</label>
                                            <textarea class="form-control" name="pdisease" rows="3"></textarea>
                                        </div>
                                    <br/>
    							</div>
                                
                                <div class="col-md-6">
                                			<div class="form-group">
                                            	<label>Photo</label>
                                            	<input type="file" name="file1" />
                                        	</div>
                                        	<div class="form-group">
                                            <label>Consulting Doctor</label>
                                            <select class="form-control" name="pdoctor">
                                            	<option>- Select Doctor Name -</option>
                                            	<?php
													include("../connect.php");
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
                                        	</div>
                                        	<div class="form-group">
	                                            <label>Room No / Ward No</label>
	                                            <input class="form-control" name="proom" placeholder="Enter Room No / Ward No" />
                                        	</div>
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea class="form-control" name="paddress" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" name="pmob" class="form-control" placeholder="Enter Mobile No" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" name="pemail" class="form-control" placeholder="Enter Email Id">
                                        </div>
                                        <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
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
		$pid=$_POST['pid'];
		
			//check user alreay exists
			$qt="select * from tb_patient where pid='$pid'";
			$reset=mysql_query($qt);
			//count
			$nt=mysql_num_rows($reset);
			if($nt>0)
				{
				echo"<script>window.alert('Patient alreay exists');</script>";
				}
			else
				{
				$name=$_POST['pname'];
				$age=$_POST['age'];
				$dob=$_POST['pdob'];		
				$gender=$_POST['pgender'];
				$disease=$_POST['pdisease'];
				$pdoctor=$_POST['pdoctor'];
				$proom=$_POST['proom'];
				$paddress=$_POST['paddress'];
				$mob=$_POST['pmob'];
				$email=$_POST['pemail'];
				
				$dat=date("d-m-Y");
				
				$img=$_FILES['file1']['name'];
				$split=explode('.',strtolower($img));//image split
				$extension=end($split);
				$path="patient_photo/".$pid.".".$extension;
				move_uploaded_file($_FILES['file1']['tmp_name'],$path);
							
				$sql="insert into tb_patient(pname,pid,age,pdob,pgender,pdisease,path,pdoctor,proom,paddress,pmob,pemail,pdate,pstatus)values('$name','$pid','$age','$dob','$gender','$disease','$path','$pdoctor','$proom','$paddress','$mob','$email','$dat','0')";
				$result=mysql_query($sql);
											
				//login_table
				$log="insert into tb_login(username,pass,typ,lastaccess,stat,block)values('$pid','$dob','Patient','First Time','1','0')";
				$lres=mysql_query($log);
				echo"<script>window.alert('Saved');</script>";
				}
		}
?>