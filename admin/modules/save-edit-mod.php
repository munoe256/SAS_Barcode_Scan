<?php
include('../config/setup.php');
//include('../config/check.php');

$modname = $_POST['modname'];
$modcode = $_POST['modcode'];
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

$sql_check = "SELECT * FROM modules WHERE modname = '$modname' AND modcode != '$modcode'";
$result_check = mysqli_query($dbc, $sql_check);
if(mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a module in the database with the same module name as the one you entered!!';
	Exit();
}

		$sql = "UPDATE modules SET modname = '$modname', moddep = '$moddep',  modnotes = '$modnotes' WHERE modcode = '$modcode'";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Module data CHANGES SAVED';
		}
		else
		{
		echo 'not SAVED';	
		}

		
		
?>