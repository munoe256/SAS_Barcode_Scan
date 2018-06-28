<?php 

include('config/setup.php');

session_start(); 

$access = '1';
$visible = 'VISIBLE';

if($_POST) 
{
	
	$insno = trim($_POST['insno'], '"');
	$password = trim($_POST['password'], '"');
	$insno = trim($insno, "'");
	$password = trim($password, "'");
	$insno = trim($insno, ";");
	$password = trim($password, ";");
	
	$q = "SELECT * FROM users_instructors WHERE insno = '$insno' AND password = '$password'";
	$r = mysqli_query($dbc, $q);
	$num = mysqli_num_rows($r);
	
	if($num >= 1) 
	{
		while ($user = mysqli_fetch_assoc($r))
		{
			$_SESSION['insno'] = $_POST['insno'];
					
			header('Location: instructors.php');
		}
	}
	else
	{
		$access = '0';
	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IUM | Staff Login</title>

 	<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/login.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

<div id="header-strip">
	<div id="header-strip-container">
   
    </div>
</div>
<div id="logo-strip">
	<div id="left-space"> 
    	<i class="fa fa-unlock" style="font-size:12px;color:black; float:left; margin-right: 5px; margin-top: 25px;"></i><h1 style="float:left;">Staff Login</h1>
    </div>
    <div id="right-space"> 
    	<img src="img/ium-logo.png" height="70px" style="margin-top: 15px;" />
    </div>
</div>
<div id="login-container">
<form action="index.php" method="POST" id="frmlogin" name="frmlogin">
	
    <?php
	
		if($access == '0')
		{
			echo '<div class="login-line" id="access_denied">Either your staff number or password is wrong. Try again!!</div>';
		}
	
	?>
    
    
	<div class="login-line">
    	<div class="small-box"><i class="fa fa-user" style="font-size:12px;color:black;  margin-top: 13px;"></i></div>
        <input class="login-input" type="text" id="insno" name="insno" placeholder="Enter your staff number" required/>
    </div>
    <div class="login-line login-line-bottom">
    	<div class="small-box"><i class="fa fa-lock" style="font-size:12px;color:black;  margin-top: 13px;"></i></div>
        <input class="login-input" type="password" id="password" name="password" placeholder="Enter your password" required/>
    </div>
    <div class="login-line login-line-bottom">
    	<div id="fp" class="fp-continue"><a href="#"> forgot password</a></div>
        <div id="continue" class="fp-continue"><button class="frm-btn" type="submit">Continue</button></div>
    </div>
</form>
</div>
<div id="after-login-strip">

</div>
</body>
</html>