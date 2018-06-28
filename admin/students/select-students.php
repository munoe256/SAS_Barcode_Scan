<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';

$sql = "SELECT * FROM students WHERE visibility = '$visible'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						<th > Student Number </th>
						<th > First Name </th>
						<th > Last Name </th>
						<th > Programme </th>
						<th> Actions </th>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<th  height="30px">  </th>
						
						<th> </th>
						<th> </th>
						<th> </th>
						<th> </th>
					</tr>';
					$rowcolor = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '<tr class="'.$rowcolor.'"><td>'.$row["stuno"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row["stuname"].'</td>
								<td data-id2="'.$row["id"].'"
								>'.$row["stulname"].'</td>
								<td data-id2="'.$row["id"].'"
								>'.$row["stupro"].'</td>
								<td><button class="btn btn_view_more" id="" type="button" data-id4="'.$row["id"].'">view</button>							
								
								<a href="upload-pic.php?stuno='.$row["stuno"].'" target="_blank"><button style="width: 50px; height: 20px; line-height: 20px; margin-left: 40px; background-color: #6C0;" class="btn btn_pic" id="btn_pic" data-id7="'.$row["id"].'">Upload pic</button></a>
								</td></tr>
								';	
								if ($rowcolor =='')
								$rowcolor = 'row-grey';	
								else
								$rowcolor = '';						
				}	
					
					
					
			} else
			{
				$output .= ' <tr>
								<td colspan="5"> Programme Data not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>