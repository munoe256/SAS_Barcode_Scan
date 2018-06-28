<?php
include('../config/setup.php');
//include('../config/check.php');

$promodpro = $_POST['promodpro'];
$promodmod = $_POST['promodmod'];
$promodlev = $_POST['promodlev'];



if($promodpro =='')
{
	echo 'Error: Select Programme !!';
	Exit();
}
if($promodmod =='')
{
	echo 'Error: Select Module !!';
	Exit();
}
if($promodlev =='')
{
	echo 'Error: Select Level!!';
	Exit();
}


$sql_check = "SELECT * FROM promod WHERE proname = '$promodpro' AND modname = '$promodmod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: Module already assigned to Programme!!';
	Exit();
}

$sql_check = "SELECT * FROM promod WHERE proname = '$promodpro' AND level = '$promodlev'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 5) 
{
	echo 'Error: The PROGRAMME you selected has 6 modules assigned to it at the LEVEL you selected. A PROGRAMME can only have a maximum of six modules per LEVEL!!';
	Exit();
}
						
$visible = 'V';

		$sql = "INSERT INTO promod (proname, modname, level, visibility ) VALUES ('$promodpro', '$promodmod', '$promodlev', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Programme Module data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>