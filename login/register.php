<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'connect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysqli_real_escape_string($con, $_POST['uname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($con, $_POST['pass']));
	
	if(mysqli_query($con, "INSERT INTO users(username,email,password) VALUES('".$uname."','".$email."','".$upass."')"))
	{
            $msg = 'Congratulation you have successfully registered.';
		
        
       
	}
	else
	{
            $msg = 'Error while registering you...';
	
       
        
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
    <?php echo @$msg;?>
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>