<?php
include('../config/setup.php');
//include('../config/check.php');

$cname = 'semester';

$sql = "SELECT * FROM counterz WHERE cname = '$cname'";
$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno = $row['cvalue'];
						$semno = $semno + 1;
						
					echo '<input type="number" contentnoteditable required name="semno" id="semno" value="'.$semno.'" />';

				}
			}
?>