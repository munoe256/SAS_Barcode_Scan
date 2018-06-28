<?php
include('../config/setup.php');
//include('../config/check.php');

$procode = $_POST['procode'];
$proname = $_POST['proname'];
$profac = $_POST['profac'];
$pronotes = $_POST['pronotes'];


if($procode =='')
{
	echo 'Error: Enter Programme code!!';
	Exit();
}
if($proname =='')
{
	echo 'Error: Enter Programme name!!';
	Exit();
}
if($profac =='')
{
	echo 'Error: Select Programme faculty!!';
	Exit();
}


$sql_check = "SELECT * FROM programmes WHERE procode = '$procode'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Programme in the database with the same Programme code that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM programmes WHERE proname = '$proname'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Programme in the database with the same Programme name that you entered!!';
	Exit();
}
						
$visible = 'V';

		$sql = "INSERT INTO programmes (procode, proname, profac, pronotes, visibility ) VALUES ('$procode', '$proname', '$profac', '$pronotes', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Programme data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>