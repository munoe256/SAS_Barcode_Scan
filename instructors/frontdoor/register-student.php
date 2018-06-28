<?php

include('../config/setup.php');

$p = 'P';
$stuno = $_POST['stuno'];
$lecid = $_POST['lecid'];

$sql0 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' AND stuno = '$stuno'";
$result0 = mysqli_query($dbc, $sql0);

			if(mysqli_num_rows($result0) != 1)
			{
						echo'<i class="fa fa-close" style="color:red;font-size:50px; margin-right:5px;"></i>';
						exit();
			}

$sql = "UPDATE lecture_attendence SET status = '$p' WHERE lecture_id = '$lecid' AND stuno = '$stuno'";
$result = mysqli_query($dbc, $sql);

$file = strtolower($stuno);
$file = $file.'.jpg';

			if($result)
			{
				echo'<i class="fa fa-check-circle" style="color:#6C0;font-size:50px; margin-right:5px;"></i><br><br><br>
				<img src="../admin/uploads/'.$file.'" height="150px;" alt="Student pic not found" style="margin-left: -250px;"/>
				';
			}
			else
			{
				echo'<i class="fa fa-check-circle" style="color:red; font-size:50px; margin-right:5px;"></i>';
			}

?>