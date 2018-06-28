<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';

$sql = "SELECT * FROM modules WHERE visibility = '$visible'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						<th> Module Code </th>
						<th class="column-modname"> Module Name </th>
						<th class="column-moddep"> Department </th>
						<th> Actions </th>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<th height="30px">  </th>
						
						<th class="column-modname"> </th>
						<th class="column-moddep"> </th>
						<th> </th>
					</tr>';
					$rowcolor = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '<tr class="'.$rowcolor.'"><td>'.$row["modcode"].'</td>
								<td class="column-modname" data-id1="'.$row["id"].'"
								>'.$row["modname"].'</td>
								<td class="column-moddep" data-id2="'.$row["id"].'"
								>'.$row["moddep"].'</td>
								
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
								<td colspan="5"> Module Data not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>