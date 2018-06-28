<?php
include('../config/setup.php');
//include('../config/check.php');

$sturegstu = $_POST['sturegstu'];
$visible = 'V';
if($sturegstu =='')
{
	echo 'Error: Enter Student number !!';
	Exit();
}

$open = 'O';
$sql = "SELECT * FROM semesters WHERE oc = '$open'";

$result = mysqli_query($dbc, $sql);
If (mysqli_num_rows($result) == 1) 
{
			while($row = mysqli_fetch_array($result))
				{
						$sem = $row['semno'];
				}
}


$sql_check = "SELECT * FROM stureg WHERE stuno = '$sturegstu' AND semno = '$sem' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: Student already registered for this semester!!';
	Exit();
}

$sql_check = "SELECT * FROM students WHERE stuno = '$sturegstu' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) == 1) 
{
	while($row = mysqli_fetch_array($result_check))
				{
						$lastlevel = $row['level'];
						$stupro = $row['stupro'];
				}
}
else
{
	echo 'Error: Student level was not found!!';
	Exit();
}

If ($lastlevel == '0') 
{
	$currentlevel = '1.1';	
}
else if($lastlevel == '1.1') 
{
	$currentlevel = '1.2';
}
else if($lastlevel == '1.2') 
{
	$currentlevel = '2.1';
}
else if($lastlevel == '2.1') 
{
	$currentlevel = '2.2';
}
else if($lastlevel == '2.2') 
{
	$currentlevel = '3.1';
}
else if($lastlevel == '3.1') 
{
	$currentlevel = '3.2';
}
else if($lastlevel == '3.2') 
{
	$currentlevel = '4.1';
}
else if($lastlevel == '4.1') 
{
	$currentlevel = '4.2';
}
else
{
	echo 'Error: Student level was not found!!';
	Exit();
}

$sql_check = "SELECT * FROM promod WHERE proname = '$stupro' AND level = '$currentlevel'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	while($row = mysqli_fetch_array($result_check))
				{
						$sql = "INSERT INTO stureg (stuno, modcode, level, semno, visibility ) VALUES ('$sturegstu', '$row[modname]', '$row[level]', $sem, '$visible')";
						$result = mysqli_query($dbc, $sql);
				}
}
else
{
	echo 'Error: Modules for current level were not found!!';
	Exit();
}						


		$sql = "UPDATE students SET level = '$currentlevel' WHERE stuno = '$sturegstu'";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Student registration data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>