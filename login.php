<?php
	include('dbconn.php');
?>
<?php
	if(empty($_REQUEST['logout'])){
		if(isset($_COOKIE['logged_in']))
			header('Location:home/home.html');
		}
	else{
		setcookie('logged_in','', time()-3600);
	}
	if(!empty($_REQUEST['submitBtn'])){
		$firstname =$_REQUEST['fname'];
		$lastname =$_REQUEST['lname'];
		$email =$_REQUEST['email'];
		$userpwd = md5($_REQUEST['pwd']);
		$gen =$_REQUEST['Gender'];
		$day=$_REQUEST['day'];
		$month=$_REQUEST['month'];
		$year=$_REQUEST['year'];
		$date=$year."-".$month."-".$day;
        $sql= "INSERT INTO users VALUES('','$firstname','$lastname','$email','$userpwd','$gen','$date')";
		mysql_query($sql);
	}
	if(!empty($_REQUEST['loginBtn']) || (!empty($_COOKIE['uname']) && !empty($_COOKIE['upwd'])))
	{
		$UserName=$_REQUEST['uname'];
		$UserPwd=  md5($_REQUEST['pwd']);
		if (!empty($_REQUEST['rem']) && $_REQUEST['rem']==1)
		{
			setcookie('uname',$UserName,time()+3600);	
			setcookie('upwd',$UserPwd,time()+3600);	
		}
		if(!empty($_COOKIE['uname']) && !empty($_COOKIE['upwd'])){
			$UserName = $_COOKIE['uname'];
			$UserPwd = $_COOKIE['upwd'];
		}
		$sql ="SELECT emailid,userpwd FROM users  WHERE emailid='$UserName' AND userpwd='$UserPwd' ";
		$result = mysql_query($sql) or die(mysql_error());
		$userData = mysql_fetch_array($result);
		$rws= mysql_num_rows($result);
		if ($rws==1) {
			$_SESSION['login']=1;
			$_SESSION['fname']= $userData['2'];
			header('Location:home.html');
		} else {
			echo "Wrong Input !!";
		}
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Help Desk</title>
		<link rel="stylesheet" type="text/css" href="logstyle.css">
		<script type="text/javascript" src="myscript.js"></script>
	</head>
	<body>
		<div id="wrapper">
		<div id="header">
		<form  id="t1" action="" method="POST">
			<table align="center">
				<tr>
					<td class="c1">Username :</td>
					<td><input type="text" name="uname" /></td>
					<td>   </td>
					<td class="c1">Password :</td>
					<td><input type="password" name="pwd" /></td>
					<td>   </td>
				<td class="c1"><input type="submit" name="loginBtn" value="Log In"/></td>
				<td>   </td>
			<td class="c1">Remember Me <input type="checkbox" name ="rem" value="1" /></td>
				</tr>
			</table>
		</form>
		</div>
		<div id="content">
		<form action="" method="POST" onsubmit="return validation()">
			<table  id="t2" align="center">
			<tr><td  colspan="2" style="color:blue;font-size:28px;font-family:arial black;">Create Your Account</td></tr>
			<tr><td style="color:black;font-size:21px;font-family:Bookman Old Style;">It's free and always will be.</td></tr>
		<tr>
		<td><input  class="c2" type="text" name="fname" placeholder="First Name" /></td>
		<td><input class="c2" type="text" name="lname"  placeholder="Last Name" /></td>
					</tr>
					<tr>
		<td><input class="c2" id="e2" type="text" name="email"  placeholder="Your Email" /></td>
					</tr> 
					<tr>
		<td><input class="c2"  type="password" name="pwd"  placeholder="Password" /></td>
					</tr>
	<tr><td style="color:black;font-size:15px;font-family:arial black;">Birthday:</td></tr>
					
<tr>
	<td>
		<select  class="c3" name="day" >
<?php
echo "<option>DAY</option>";
for ($val=1; $val <=30; $val++) 
echo "<option>$val</option>";
?>
		</select>
		<select class="c3" name="month">
	<?php

echo "<option>$f</option>";
for ($val=1; $val <=12; $val++) 
echo "<option>$val</option>";
?>
			
			?>
		</select>
		
		<select class="c3" name="year">
	<?php
$f=YEAR;	
echo "<option>$f</option>";
for ($val=1880; $val <=2016; $val++) 
echo "<option>$val</option>";
?>
		</select>
</td>
</tr>
<tr>
<td style="color:black;font-size:18px;font-family:arial black;">Male<input type="radio" name="Gender" value="MALE" />         Female<input  type="radio" name="Gender" value="FEMALE" /></td>
</tr>
			<tr>
<td align="left"><input style="color:green;font-size:25px;font-family:arial black;" type="submit" name="submitBtn" value="Sign Up"/></td>
	 				</tr>
			</table>
		</form>
		</div>
		<div id="footer">About Us</div>
	</body>
</html>
