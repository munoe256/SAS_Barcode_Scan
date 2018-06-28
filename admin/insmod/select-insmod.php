<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';
$searchtext = $_POST['searchtext'];

$sql = "SELECT * FROM insmod WHERE visibility = '$visible' AND insno='$searchtext'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						
						<th class="promod-name"> Module </th>
						<th> Date Assigned </th>
						<th> Actions </th>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<th class="promod-name" height="30px">  </th>
						
						<th> </th>
						<th> </th>
					</tr>';
					$rowcolor = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					
					//$sql1 = "SELECT * FROM instructors WHERE visibility = '$visible' AND insno='$searchtext'";
					//$result1 = mysqli_query($dbc, $sql1);
					
					//if(mysqli_num_rows($result1) == 1)
					//	{
					//		while($row1 = mysqli_fetch_array($result1))
					//		{
					//			$fullname = $row1["insname"].' '.$row1["inslname"];
					//		}
					//	}
					
					
					$output .= '<tr class="'.$rowcolor.'"><td class="promod-name">'.$row["modname"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row["date_of_capture"].'</td>
								
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
								<td colspan="5"> Instructor Modules not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>