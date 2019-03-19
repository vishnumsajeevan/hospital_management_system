<?php
	$server="127.0.0.1:3306";
	$username="root";
	$password="";
	$dbname="hms";	
	$con=mysql_connect($server,$username,$password);
	mysql_select_db($dbname);
?>