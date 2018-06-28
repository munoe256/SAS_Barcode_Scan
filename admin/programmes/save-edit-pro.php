<?php
include('../config/setup.php');
//include('../config/check.php');

$proname = $_POST['proname'];
$procode = $_POST['procode'];
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



$sql_check = "SELECT * FROM programmes WHERE proname = '$proname' AND procode != '$procode'";
$result_check = mysqli_query($dbc, $sql_check);
if(mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a programmes in the database with the same programme name as the one you entered!!';
	Exit();
}

		$sql = "UPDATE programmes SET proname = '$proname', profac = '$profac',  pronotes = '$pronotes' WHERE procode = '$procode'";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Programme data CHANGES SAVED';
		}
		else
		{
		echo 'not SAVED';	
		}

		
		
?>