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
        <!-- CUSTOM STYLES-->
    <link href="../admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="labhome.php">Laboratory</a> 
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
                    <img src="../admin/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="labhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="searchprescription.php"><i class="fa fa-table fa-3x"></i> View prescription</a>
                    </li>
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-desktop fa-3x"></i> Settings<span class="fa arrow"></span></a>
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
                     <h2>Settings</h2>   
                        <h5>Welcome, Love to see you back.</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             <form role="form" name="form1" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="user" value="<?php print $uname; ?>" placeholder="Enter Username" />
                                        </div>
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="cpass" placeholder="Enter Current Password" />
                                        </div>
                                    <br />
    							</div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="npass" placeholder="Enter New Password" />
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="rpass" placeholder="Re-enter New Password" />
                                        </div>
                                        
                                        <button type="submit" name="submit1" class="btn btn-primary"><i class=" fa fa-refresh "></i> Change</button>
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
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../admin/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../admin/assets/js/custom.js"></script>
    
   
</body>
</html>

<?php
	if(isset($_POST['submit1']))
		{
				include("../connect.php");
				$un=$_POST['user'];
				$cpass=$_POST['cpass'];
				$npass=$_POST['npass'];
				$rpass=$_POST['rpass'];

				if($npass==$rpass)
					{
					$sql="select * from tb_login where username='$uname' and pass='$cpass' and typ='$type'";
					$result=mysql_query($sql);
					$numb=mysql_num_rows($result);
					if($numb>0)
						{
						//check username alreay exists
						$qt="select * from tb_login where username='$un' and username!='$uname'";
						$reset=mysql_query($qt);
						$nt=mysql_num_rows($reset);
						//count
						if($nt>0)
							echo"<script>window.alert('Username already exists');</script>";
						else
							{
							$qry="update tb_login set pass='$npass',username='$un' where username='$uname' and typ='$type' and pass='$cpass'";
							$res=mysql_query($qry);
							echo"<script>window.alert('Changed');</script>";
							echo "<script>location.reload();window.location.href='../logout.php';</script>";
							}
						}
					else
						echo"<script>window.alert('Current password is incorrect');</script>";
					}
			  	else
				  	echo"<script>window.alert('Passwords are mismatched');</script>";
		}
?>