 <?php
	session_start();
	$serverName="localhost";
	$dbUserName="root";
	$dbPassword= "" ;
	$dbName="project";
	mysql_connect($serverName,$dbUserName,$dbPassword) or die(mysql_error());
	mysql_select_db($dbName);
?>