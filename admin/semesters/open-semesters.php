<?php
include('../config/setup.php');
//include('../config/check.php');

$id = $_POST['id'];


$sq = "SELECT * FROM semesters WHERE counter = '$id'";
$resul = mysqli_query($dbc, $sq);

			if(mysqli_num_rows($resul) == 1)
			{
				while($ro = mysqli_fetch_array($resul))
				{
					$semno = $ro['semno'];
					$semcode = $ro['semcode'];
					$semsdate = $ro['sdate'];
					$semedate = $ro['edate'];
				}
			}

$occ = 'O';

									$date = $semedate;
									$date1 = date( 'Y-m-d', strtotime( $date ) );
									$date2 = strtotime($date1);
									
									
									$cdate = date('Y-m-d');
									$cdate2 = strtotime($cdate);
									
									
									$secs = $cdate2 - $date2;
									
									if ($secs > 0) {
										echo 'Error: TheThe semester has reached its end date so you cannot open it!!';
										Exit();
									}	


$visible = 'V';
$oc = 'O';

		$sql = "UPDATE semesters SET oc = '$oc' WHERE counter = '$id'";
		$result = mysqli_query($dbc, $sql);
		
		if ($result){	
		echo 'Semester successfully closed';
		}
		else
		{
		echo 'not closed';	
		}

		
?>