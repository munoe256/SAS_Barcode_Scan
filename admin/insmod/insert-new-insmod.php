<?php
include('../config/setup.php');
//include('../config/check.php');

$insmodins = $_POST['insmodins'];
$insmodmod = $_POST['insmodmod'];

if($insmodins =='')
{
	echo 'Error: Select Instructor !!';
	Exit();
}
if($insmodmod =='')
{
	echo 'Error: Select Module !!';
	Exit();
}


$sql_check = "SELECT * FROM insmod WHERE insno = '$insmodins' AND modname = '$insmodmod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: Module already assigned to Instructor!!';
	Exit();
}

$sql_check = "SELECT * FROM insmod WHERE modname = '$insmodmod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: Module already assigned to another Instructor!!';
	Exit();
}

$sql_check = "SELECT * FROM insmod WHERE insno = '$insmodins'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 2) 
{
	echo 'Error: The Instructor you selected has 3 modules assigned to him/her. An Instructor can only have a maximum of 3 modules!';
	Exit();
}
						
$visible = 'V';

		$sql = "INSERT INTO insmod (insno, modname, visibility ) VALUES ('$insmodins', '$insmodmod', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Instructor Module data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>