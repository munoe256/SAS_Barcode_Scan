<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';
$searchtext = $_POST['searchtext'];

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


$sql = "SELECT * FROM timetable WHERE modcode = '$searchtext' AND semno = '$sem'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						
						<th> Week Day </th>
						<th> Start Time </th>
						<th> End Time </th>
						<th> Actions </th>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						
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
					
					$sql1 = "SELECT * FROM modules WHERE visibility = '$visible' AND modcode = '$row[modcode]'";
					$result1 = mysqli_query($dbc, $sql1);
					
					if(mysqli_num_rows($result1) == 1)
						{
							while($row1 = mysqli_fetch_array($result1))
							{
								$modname = $row1['modname'];
							}
						}
					
					
					$output .= '<tr class="'.$rowcolor.'">
								<td data-id1="'.$row["id"].'"
								>'.$row["the_day"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row["the_time_s"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row["the_time_e"].'</td>
								<td><button class="btn btn_view_more" id="" type="button" data-id4="'.$row["id"].'">view</button>							
								<button class="btn btn_delete" id="btn_deleted" data-id7="'.$row["id"].'">delete</button>
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
								<td colspan="5"> Student not registered this semester</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>