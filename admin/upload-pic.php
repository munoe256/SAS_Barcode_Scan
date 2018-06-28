
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pic Uploads</title>
</head>

<body>

<?php

include('config/setup.php');

session_start(); 

$access = '1';
$visible = 'VISIBLE';

if($_GET) 
{
	
	$stuno = $_GET['stuno']; ?>
	
	<form action="uploads.php" name="iddoc2" method="post" enctype="multipart/form-data" style="padding-left:20px;"><br/>
	<label>Upload pic for Student <?php echo $stuno;?></label><br><br>
 	<label style="margin-right: 20px;">Select Pic</label><input style="border: 1px solid;" type="file" name="file" /><br><br><b>choose jpeg (jpg) files only</b><br><br>
 	<button style="width: 330px;" type="submit" name="btn-upload">Upload</button><input type="hidden" name="stuno" value="<?php echo $stuno;?>">
 	</form>
    
<?php 
}
else
{
	echo 'No student selected';
	
	}

?>


</body>
</html>