<html>
<head>
<script>
	window.history.forward(' ');
    function noback()
		{
		window.history.forward();
        }
</script>
</head>
<body onLoad="noback()" onpageshow="if(event.persist) noback()">
<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['typ']);
	unset($_SESSION['lastaccess']);
	session_destroy();
	header("location:index.html");
?>
</body>
</html>
