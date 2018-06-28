<?php
include('../config/setup.php');
//include('../config/check.php');

$semno = $_POST['semno'];
$semcode = $_POST['semcode'];
$semsdate = $_POST['semsdate'];
$semedate = $_POST['semedate'];
$semnotes = $_POST['semnotes'];

if($semno =='')
{
	echo 'Error: Enter semester number!!';
	Exit();
}
if($semcode =='')
{
	echo 'Error: Enter semester code!!';
	Exit();
}
if($semsdate =='')
{
	echo 'Error: Enter semester Start date!!';
	Exit();
}
if($semedate =='')
{
	echo 'Error: Enter semester End date!!';
	Exit();
}

if (!(is_numeric($semno))) {
	echo 'Error: Semester number should be numeric!!';
	Exit();
}

//$datetocheck = date('m,d,Y', strtotime($semsdate));
//$d = explode('-', $semsdate);

//$month = $d[1];  
//$year = $d[0];  
//$day = $d[2];

//	echo $semsdate;
//if(!(checkdate($month, $day, $year)))
//{
//	echo 'Error: The semester start date you entered is not a valid date!!';
//	Exit();
//}

$cname = 'semester';

$sql = "SELECT * FROM counterz WHERE cname = '$cname'";
$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno2 = $row['cvalue'];
						$semno2 = $semno2 + 1;
				}
			}
			if ($semno != $semno2){
				echo 'Error: Semester number should be '.$semno2.'!!';
				Exit();
			}
			
			
$occ = 'O';
			
$q = "SELECT * FROM semesters WHERE oc = '$occ'";
$r = mysqli_query($dbc, $q);
If (mysqli_num_rows($r) > 0) 
{
	echo 'Error: There is an open semester already. close the open semester before adding a new one!!';
	Exit();
}


$sql_check = "SELECT * FROM semesters WHERE semno = '$semno'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a semester in the database with the same semester number that you entered!!';
	Exit();
}

$sql_check = "SELECT * FROM semesters WHERE semcode = '$semcode'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a semester in the database with the same semester code that you entered!!';
	Exit();
}
$sql_check = "SELECT * FROM semesters WHERE sdate = '$semsdate'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a semester in the database with the same semester start date that you entered!!';
	Exit();
}
$sql_check = "SELECT * FROM semesters WHERE edate = '$semedate'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
	echo 'Error: There is a semester in the database with the same semester end date that you entered!!';
	Exit();
}

$semno2 = $semno2 - 1;


$sql_check = "SELECT * FROM semesters WHERE semno = '$semno2'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) == 0) 
{
	while($row = mysqli_fetch_array($result_check))
	{
		$lastsemsdate = $row['sdate'];
		$lastsemedate = $row['edate'];			
	}
	
	if($lastsemsdate == $semsdate){
		echo 'Error: The last semester successfully saved had the same start date as the semester that you just entered!!';
		Exit();
	}
	
	if($lastsemedate == $semedate){
		echo 'Error: The last semester successfully saved had the same end date as the semester that you just entered!!';
		Exit();
	}
	
	if($lastsemedate == $semedate){
		echo 'Error: The last semester successfully saved had the same end date as the semester that you just entered!!';
		Exit();
	}
	
	
}
$sql_check = "SELECT * FROM semesters WHERE sdate >= '$semsdate'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
		echo 'Error: the semester start date you just entered is overlaping into other previously entered semesters!!';
		Exit();
}
$sql_check = "SELECT * FROM semesters WHERE edate >= '$semsdate'";
$result_check = mysqli_query($dbc, $sql_check);
If (mysqli_num_rows($result_check) > 0) 
{
		echo 'Error: the semester start date you just entered is overlaping into other previously entered semesters!!';
		Exit();
}

								$date1 = $semsdate;
								//$date1 = date( 'Y-m-d', strtotime( $date1 ) );
								$date2 = strtotime($date1);
								
								$cdate = $semedate;
								$cdate2 = strtotime($cdate);
								
								$secs = $cdate2 - $date2;// == <seconds between the two times>
								
								if ($secs < 0) {
									echo 'Error: the semester end date you just entered is less than the semester start date!!';
									Exit();
								}
									

$visible = 'V';
$oc = 'O';

		$sql = "INSERT INTO semesters (semno, semcode, sdate, edate, notes, oc, visibility ) VALUES ('$semno', '$semcode', '$semsdate', '$semedate', '$semnotes', '$oc', '$visible')";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Semester data inserted';
		}
		else
		{
		echo 'not inserted';	
		}

		$sql = "UPDATE counterz SET cvalue='$semno' WHERE cname='$cname'";
		$result = mysqli_query($dbc, $sql);
		
		
		
?>