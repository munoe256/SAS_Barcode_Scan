<?php
include('config/setup.php');
$stuno = $_GET['stuno'];
$modcode = $_GET['modcode'];
$cname = 'O';
$p = 0;
$a = 0;


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IUM | Attendence Report</title>
	<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/main.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" media="screen" />
 
</head>

<body style="padding-left: 20px;">
<?php

echo ' <h1 style="padding: 5px;">Student Attendence Report</h1>';

$sqlmn = "SELECT * FROM students WHERE stuno = '$stuno'";
					$rmn = mysqli_query($dbc, $sqlmn);
					
						if(mysqli_num_rows($rmn) == 1)
						{
							while($rowmn = mysqli_fetch_array($rmn))
							{
								$stuname = $rowmn['stuname'];
								$stulname = $rowmn['stulname'];
								$stufname = $stuname.' '.$stulname;
							}
						}
						
						echo ' <h2 style="padding: 5px;">Student # : '.$stuno.'</h2>
								<h2 style="padding: 5px;">Student Name : '.$stufname.'</h2>
								<h2 style="padding: 5px;">Module : '.$modcode.'</h2>';

echo '<table>
			<tr style="background-color: #E1E0E0; height: 30px; line-height: 30px;">
								<td width="150px">Lecture Date</td>
								<td width="120px">Start Time</td>
								<td width="120px">End time</td>
								<td width="120px">Result</td>
										
							</tr>';




			$sql = "SELECT * FROM semesters WHERE oc = '$cname'";
			$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno = $row['semno'];
				}
			}

			$sqlmod = "SELECT * FROM lecture WHERE modcode = '$modcode' AND semno = '$semno'";
			$rmod = mysqli_query($dbc, $sqlmod);
			$nooflectures = mysqli_num_rows($rmod);
			
			if(mysqli_num_rows($rmod) > 0)
			{
				while($rowmod = mysqli_fetch_array($rmod))
				{
					$lecid = $rowmod['id'];
					$time_s = $rowmod['time_s'];
					$time_e = $rowmod['time_e'];
					$lecdate = $rowmod['date_of_lecture'];
					
					$sql5 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' and stuno = '$stuno'";
					$result5 = mysqli_query($dbc, $sql5);
		
					if(mysqli_num_rows($result5) > 0)
					{
						while($row5 = mysqli_fetch_array($result5))
						{
							
							$decision = $row5['status'];
							
							if($decision == 'P')
							{
								$decision = 'Present';
								$p = $p + 1;
							}
							
							elseif($decision == 'A')
							{
								$decision = 'Absent';
								$a = $a + 1;
							}
							else
							{
								$decision = 'Present';
								$p = $p + 1;
							}
							
							echo '<tr style="height: 30px; line-height: 30px;"><td>'.$lecdate.'</td>
								<td>'.$time_s.'</td>
								<td>'.$time_e.'</td>
								<td>'.$decision.'</td>
								</tr>
								';	
						}
					}
	
				}
			}

echo '</table>';

if($nooflectures != 0)
{
$atrate = $p / $nooflectures * 100;
$atrate = number_format((float)$atrate, 2, '.', '');
}
else
{
	$atrate = 0;
}

echo '<hr style="width: 500px;float: left;"><h2 style="clear:left;">Total Number of lectures : '.$nooflectures.'</h2>
<h2>Total Number of lectures attendend : '.$p.'</h2>
<h2>Total Number of lectures unattended : '.$a.'</h2>
<h1>Attendence rate : '.$atrate.'%</h1>
<hr style="width: 500px;float: left;">';
?>

</body>
</html>