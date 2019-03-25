<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query($con, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_assoc($res);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Codemarts.com - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Codemarts</label>
    </div>
    <div id="right">
    	<div id="content">
        	Welcome <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
	<a href="http://codemarts.com/">Codemarts - programming blog</a><br />
    <p>PHP Tutorial, Ajax, Jquery, Mysql, Codemarts Programming Blog</p>
</div>

</body>
</html>