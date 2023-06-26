<?php
	include('dbconn.php');
	if(empty($_SESSION['login']))
		header('Location:index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Profile</title>
</head>
<body>
	<h1>WELCOME <?php echo $_SESSION['fname']; ?> </h1>
	<a href="destroy.php">Logout</a>
	<?php
	//echo session_id();
	//echo $_SESSION['value']
	?>
</body>
</html>