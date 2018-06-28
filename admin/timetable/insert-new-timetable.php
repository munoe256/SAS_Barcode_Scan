<?php
include('../config/setup.php');
//include('../config/check.php');

$timetablemod = $_POST['timetablemod'];
$timetableday = $_POST['timetableday'];
$timetabletime = $_POST['timetabletime'];

$visible = 'V';
if($timetablemod =='')
{
	echo 'Error: Select Module !!';
	Exit();
}

if($timetableday =='')
{
	echo 'Error: Select day !!';
	Exit();
}

if($timetabletime =='')
{
	echo 'Error: Select Time !!';
	Exit();
}

if($timetabletime =='08-10')
{
	$timetabletime1 = '08:00:00';
	$timetabletime2 = '10:00:00';
}
elseif ($timetabletime =='10-12')
{
	$timetabletime1 = '10:00:00';
	$timetabletime2 = '12:00:00';
}
elseif ($timetabletime =='12-14')
{
	$timetabletime1 = '12:00:00';
	$timetabletime2 = '14:00:00';
}
elseif ($timetabletime =='14-16')
{
	$timetabletime1 = '14:00:00';
	$timetabletime2 = '16:00:00';
}
elseif ($timetabletime =='16-18')
{
	$timetabletime1 = '16:00:00';
	$timetabletime2 = '18:00:00';
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


$sql_check = "SELECT * FROM timetable WHERE modcode = '$timetablemod' AND semno = '$sem' AND the_time_s = '$timetabletime1' AND the_time_e = '$timetabletime2' AND the_day = '$timetableday' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: The Module you selected has been given that slot already!!';
	Exit();
}

$sql_check = "SELECT * FROM insmod WHERE modname = '$timetablemod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) == 1) 
{
	while($row = mysqli_fetch_array($result_check))
				{
						$insno = $row['insno'];
				}
}
else
{
	echo 'Error: Instructor for module selected was not found!!';
	Exit();
}

$sql_check = "SELECT * FROM insmod WHERE insno = '$insno' AND modname != '$timetablemod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	while($row = mysqli_fetch_array($result_check))
				{
						$modcode2 = $row['modname'];
						
						$sql_check1 = "SELECT * FROM timetable WHERE modcode = '$modcode2' AND semno = '$sem' AND the_time_s = '$timetabletime1' AND the_time_e = '$timetabletime2' AND the_day = '$timetableday' ";
						$result_check1 = mysqli_query($dbc, $sql_check1);
						If (mysqli_num_rows($result_check1) > 0) 
						{
							echo 'Error: The Instructor for the Module selected is instructing another module at the same time you selected!!';
							Exit();
						}
						
				}
}

$sql_check = "SELECT * FROM promod WHERE modname = '$timetablemod' ";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	while($row = mysqli_fetch_array($result_check))
				{
						$procode = $row['proname'];
						$level = $row['level'];
						
						
						$sql_check0 = "SELECT * FROM promod WHERE proname = '$procode' AND modname != '$timetablemod' AND level = '$level' ";
						$result_check0 = mysqli_query($dbc, $sql_check0);
						If (mysqli_num_rows($result_check0) > 0) 
						{
							while($row0 = mysqli_fetch_array($result_check0))
										{
												$modcode2 = $row0['modname'];
												
												$sql_check1 = "SELECT * FROM timetable WHERE modcode = '$modcode2' AND semno = '$sem' AND the_time_s = '$timetabletime1' AND the_time_e = '$timetabletime2' AND the_day = '$timetableday' ";
												$result_check1 = mysqli_query($dbc, $sql_check1);
												If (mysqli_num_rows($result_check1) > 0) 
												{
													echo 'Error: Students on the '.$procode.' Programme have another module at the same time and day selected!!';
													Exit();
												}
												
										}
						}

						
						
						
						
						
						
						
						
						
				}
}

$sql = "INSERT INTO timetable (modcode, the_day, the_time_s, the_time_e, semno ) VALUES ('$timetablemod', '$timetableday', '$timetabletime1', '$timetabletime2', '$sem')";
$result = mysqli_query($dbc, $sql);

		
		if ($result){	
		echo 'Module timetable data inserted';
		}
		else
		{
		echo 'not inserted';	
		}
?>