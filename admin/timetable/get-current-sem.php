<?php
include('config/setup.php');

$open = 'O';

$sql = "SELECT * FROM semesters WHERE oc = '$open'";

$result = mysqli_query($dbc, $sql);
If (mysqli_num_rows($result) == 1) 
{
			while($row = mysqli_fetch_array($result))
				{
						echo '<label style="color: #74ABF7; padding-left: 20px; font-size: 12px;" type="text" contentnoteditable required name="sturegsem" id="sturegsem" ><span style="margin-right: 15px;"> '.$row['semno'].'</span>        '.$row['sdate'].'   to   '.$row['edate'].'</label>';
				}
}

?>