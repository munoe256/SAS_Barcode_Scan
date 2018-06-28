<?php
include('../config/setup.php');
//include('../config/check.php');

$modcode = $_POST['modcode'];
$modname = $_POST['modname'];
$moddep = $_POST['moddep'];
$modnotes = $_POST['modnotes'];

if($modcode =='')
{
	echo 'Error: Enter Module code!!';
	Exit();
}
if($modname =='')
{
	echo 'Error: Enter Module name!!';
	Exit();
}
if($moddep =='')
{
	echo 'Error: Select Module department!!';
	Exit();
}


$sql_check = "SELECT * FROM modules WHERE modcode = '$modcode'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Module in the database with the same Module code that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM modules WHERE modname = '$modname'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Module in the database with the same Module name that you entered!!';
	Exit();
}
						
$visible = 'V';

		$sql = "INSERT INTO modules (modcode, modname, moddep, modnotes, visibility ) VALUES ('$modcode', '$modname', '$moddep', '$modnotes', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Module data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>