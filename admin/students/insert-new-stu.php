<?php
include('../config/setup.php');
//include('../config/check.php');

$stuno = $_POST['stuno'];
$stuname = $_POST['stuname'];
$stulname = $_POST['stulname'];
$stugender = $_POST['stugender'];

$studob = $_POST['studob'];
$stupob = $_POST['stupob'];
$stucit = $_POST['stucit'];
$stupro = $_POST['stupro'];

$stuid = $_POST['stuid'];
$stuidt = $_POST['stuidt'];
$stumo = $_POST['stumo'];
$stumno = $_POST['stumno'];

$stuphyadd = $_POST['stuphyadd'];
$stuposadd = $_POST['stuposadd'];
$stunokname = $_POST['stunokname'];
$stunokmo = $_POST['stunokmo'];

$stunokmno = $_POST['stunokmno'];

$stumob = $stumo.$stumno ;
$stunokmob = $stunokmo.$stunokmno ;


if($stuno =='')
{
	echo 'Error: Enter Student Number!!';
	Exit();
}
if($stuname =='')
{
	echo 'Error: Enter Student First Name!!';
	Exit();
}
if($stulname =='')
{
	echo 'Error: Enter Student Last name!!';
	Exit();
}
if($stugender =='')
{
	echo 'Error: Select Student Gender!!';
	Exit();
}
if($studob =='')
{
	echo 'Error: Enter Student DOB!!';
	Exit();
}
if($stucit =='')
{
	echo 'Error: Enter Student Citizenship!!';
	Exit();
}
if($stupro =='')
{
	echo 'Error: Enter Student Programme!!';
	Exit();
}
if($stuid =='')
{
	echo 'Error: Enter Student ID!!';
	Exit();
}
if($stuidt =='')
{
	echo 'Error: Select Student ID Type!!';
	Exit();
}

if($stumno =='')
{
	echo 'Error: Enter Student Mobile Number!!';
	Exit();
}
if($stunokname =='')
{
	echo 'Error: Enter Student NOK Fullame!!';
	Exit();
}
if($stunokmno =='')
{
	echo 'Error: Enter Student NOK Mobile number!!';
	Exit();
}


$sql_check = "SELECT * FROM students WHERE stuno = '$stuno'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Student in the database with the same Student Number that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM students WHERE stumob = '$stumob'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Student in the database with the same Mobile Number that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM students WHERE stucit = '$stucit' AND stuid = '$stuid' AND stuidt = '$stuidt'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a Student in the database with the same Identity Number that you entered!!';
	Exit();
}

						
$visible = 'V';
$level = 0;

		$sql = "INSERT INTO students (stuno, stuname, stulname, stugender, studob, stupob, stucit, stupro, stuid, stuidt, stumob, stuphyadd, stuposadd, stunokname, stunokmob, visibility, level ) VALUES ('$stuno', '$stuname', '$stulname', '$stugender', '$studob', '$stupob', '$stucit', '$stupro', '$stuid', '$stuidt', '$stumob', '$stuphyadd', '$stuposadd', '$stunokname', '$stunokmob', '$visible', '$level')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Student data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
		
		$sql = "INSERT INTO users_students (stuno, password ) VALUES ('$stuno', '$stumob')";
		$result = mysqli_query($dbc, $sql);
		
		
?>