<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';

$sql = "SELECT * FROM programmes WHERE visibility = '$visible'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						<th> Programme Code </th>
						<th class="column-proname"> Programme Name </th>
						<th class="column-profac"> Faculty </th>
						<th> Actions </th>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<th height="30px">  </th>
						
						<th class="column-proname"> </th>
						<th class="column-profac"> </th>
						<th> </th>
					</tr>';
					$rowcolor = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '<tr class="'.$rowcolor.'"><td>'.$row["procode"].'</td>
								<td class="column-proname" data-id1="'.$row["id"].'"
								>'.$row["proname"].'</td>
								<td class="column-profac" data-id2="'.$row["id"].'"
								>'.$row["profac"].'</td>
								
								<td><button class="btn btn_view_more" id="" type="button" data-id4="'.$row["id"].'">view</button>							
								
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