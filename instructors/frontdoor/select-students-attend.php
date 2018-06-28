<?php

include('../config/setup.php');
$p = 'P';
$lecid = $_POST['lecid'];
$output = '';


$sql0 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' AND status = '$p'";
$result0 = mysqli_query($dbc, $sql0);

$rowcolor = 'row-grey';
	$output .= '<p style="padding: 10px;">List of present students</p>
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						<th > Student Number </th>
						<th > First Name </th>
						<th > Last Name </th>
						
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<th  height="30px">  </th>
						
						<th> </th>
						<th> </th>
						
					</tr>';
					$rowcolor = '';



			if(mysqli_num_rows($result0) >= 1)
			{
				while($row = mysqli_fetch_array($result0))
				{
					
					$sql1 = "SELECT * FROM students WHERE stuno = '$row[stuno]'";
					$result1 = mysqli_query($dbc, $sql1);
					
					if(mysqli_num_rows($result1) == 1)
						{
							while($row1 = mysqli_fetch_array($result1))
							{
					
						$output .= '<tr class="'.$rowcolor.'"><td>'.$row["stuno"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row1["stuname"].'</td>
								<td data-id2="'.$row["id"].'"
								>'.$row1["stulname"].'</td>
								</tr>
								';	
								if ($rowcolor =='')
								$rowcolor = 'row-grey';	
								else
								$rowcolor = '';		
							}
						}
				}
			}
			else
			{
				$output .= ' <tr>
								<td colspan="3"> Student Data not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;

?>