<?php
include('../config/setup.php');
//include('../config/check.php');

$insno = $_POST['insno'];
$insname = $_POST['insname'];
$inslname = $_POST['inslname'];
$insgender = $_POST['insgender'];

$insdob = $_POST['insdob'];
$inspob = $_POST['inspob'];
$inscit = $_POST['inscit'];
$insdep = $_POST['insdep'];

$insid = $_POST['insid'];
$insidt = $_POST['insidt'];
$insmo = $_POST['insmo'];
$insmno = $_POST['insmno'];

$insphyadd = $_POST['insphyadd'];
$insposadd = $_POST['insposadd'];
$insnokname = $_POST['insnokname'];
$insnokmo = $_POST['insnokmo'];

$insnokmno = $_POST['insnokmno'];

$insmob = $insmo.$insmno ;
$insnokmob = $insnokmo.$insnokmno ;


if($insno =='')
{
	echo 'Error: Enter Instructor Number!!';
	Exit();
}
if($insname =='')
{
	echo 'Error: Enter Instructor First Name!!';
	Exit();
}
if($inslname =='')
{
	echo 'Error: Enter Instructor Last name!!';
	Exit();
}
if($insgender =='')
{
	echo 'Error: Select Instructor Gender!!';
	Exit();
}
if($insdob =='')
{
	echo 'Error: Enter Instructor DOB!!';
	Exit();
}
if($inscit =='')
{
	echo 'Error: Enter Instructor Citizenship!!';
	Exit();
}
if($insdep =='')
{
	echo 'Error: Enter Instructor Programme!!';
	Exit();
}
if($insid =='')
{
	echo 'Error: Enter Instructor ID!!';
	Exit();
}
if($insidt =='')
{
	echo 'Error: Select Instructor ID Type!!';
	Exit();
}

if($insmno =='')
{
	echo 'Error: Enter Instructor Mobile Number!!';
	Exit();
}
if($insnokname =='')
{
	echo 'Error: Enter Instructor NOK Fullame!!';
	Exit();
}
if($insnokmno =='')
{
	echo 'Error: Enter Instructor NOK Mobile number!!';
	Exit();
}


$sql_check = "SELECT * FROM instructors WHERE insno = '$insno'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is an Instructor in the database with the same Instructor Number that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM instructors WHERE insmob = '$insmob'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is an Instructor in the database with the same Mobile Number that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM instructors WHERE inscit = '$inscit' AND insid = '$insid' AND insidt = '$insidt'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is an Instructor in the database with the same Identity Number that you entered!!';
	Exit();
}

						
$visible = 'V';

		$sql = "INSERT INTO instructors (insno, insname, inslname, insgender, insdob, inspob, inscit, insdep, insid, insidt, insmob, insphyadd, insposadd, insnokname, insnokmob, visibility ) VALUES ('$insno', '$insname', '$inslname', '$insgender', '$insdob', '$inspob', '$inscit', '$insdep', '$insid', '$insidt', '$insmob', '$insphyadd', '$insposadd', '$insnokname', '$insnokmob', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Instructor data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
		
		$sql = "INSERT INTO users_instructors (insno, password ) VALUES ('$insno', '$insmob')";
		$result = mysqli_query($dbc, $sql);
		
		
?>