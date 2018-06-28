<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';
$searchtext = $_POST['searchtext'];

$sql = "SELECT * FROM promod WHERE visibility = '$visible' AND proname='$searchtext'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						
						
						<th class="promod-name"> Module Name </th>
						<th> Level </th>
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
					$output .= '<tr class="'.$rowcolor.'"><td class="promod-name">'.$row["modname"].'</td>
								<td data-id1="'.$row["id"].'"
								>'.$row["level"].'</td>
								
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
								<td colspan="5"> Programme Modules not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>