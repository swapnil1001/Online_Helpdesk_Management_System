<?php
	include('dbconn.php');
	session_destroy();
	setcookie('PHPSESSID','',time()-7000);
	setcookie('uname','',time()-7000);
	setcookie('pwd','',time()-7000);
	header('Location:index.php');
?>