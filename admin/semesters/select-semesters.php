l<?php
include('../config/setup.php');
//include('../config/check.php');

$output = '';
$visible = 'V';

$sql = "SELECT * FROM semesters WHERE visibility = '$visible'";
$result = mysqli_query($dbc, $sql);
	
$rowcolor = 'row-grey';
	$output .= '
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr  class="'.$rowcolor.' top-row" style="font-weight: bold; color: #fff; background-color: #74ABF7;">
						<td style="width: 80px; color: #fff" > Semester # </td>
						<td style="width: 80px; color: #fff"> Semester code </td>
						<td style="width: 80px; color: #fff"> Start date </td>
						<td style="width: 80px; color: #fff"> End date </td>
						<td style="width: 80px; color: #fff"> Status </td>
						<td style="width: 100px; color: #fff"> Actions </td>
					</tr>
					<tr  class="'.$rowcolor.'" style="height: 30px;">
						<td style="width: 80px;" height="30px">  </td>
						<td style="width: 80px;"> </td>
						<td style="width: 80px;"> </td>
						<td style="width: 80px;"> </td>
						<td style="width: 80px;" > </td>
						<td style="width: 100px;"> </td>
					</tr>';
					$rowcolor = '';
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					$output .= '<tr class="'.$rowcolor.'"><td style="width: 80px;"><span style="font-style:italic;"></span>'.$row["semno"].'</td>
								<td style="width: 80px;" class="semcode" data-id1="'.$row["semno"].'"
								>'.$row["semcode"].'</td>
								<td style="width: 80px;" class="semsdate" data-id2="'.$row["semno"].'"
								>'.$row["sdate"].'</td>
								<td style="width: 80px;" class="semedate" data-id3="'.$row["semno"].'"
								>'.$row["edate"].'</td>';
								if($row['oc'] == 'O')
								{
								$output .= '<td style="width: 80px;" class="semedate" data-id3="'.$row["semno"].'">Open</td>';
								}
								else
								{
								$output .= '<td style="width: 80px;"  class="semedate" data-id3="'.$row["semno"].'">Closed</td>';
								}
								
								
								$output .= '<td style="width: 100px;">';
								if($row['oc'] == 'O')
								{							
								$output .= '
											<button class="btn btn_view_more" id="" type="button" data-id4="'.$row["counter"].'">view</button>
											<button class="btn btn_delete btn_close" id="btn_deleted" data-id7="'.$row["counter"].'">Close</button>';
								}
								else
								{
									
									$date = $row['edate'];
									$date1 = date( 'Y-m-d', strtotime( $date ) );
									$date2 = strtotime($date1);
									
									
									$cdate = date('Y-m-d');
									$cdate2 = strtotime($cdate);
									
									
									$secs = $cdate2 - $date2;// 
									
									
									
									if ($secs < 0) {
										$output .= '<button class="btn btn_delete btn-open" id="btn_deleted" data-id8="'.$row["counter"].'">Open</button>';
									}	
									$output .= '</td></tr>';
								}
								
								
									
								if ($rowcolor =='')
								$rowcolor = 'row-grey';	
								else
								$rowcolor = '';						
				}	
					
			} else
			{
				$output .= ' <tr>
								<td colspan="5"> Data not Found</td>
							</tr>';
			}
			$output .='</table>
			</div>';
			
			echo $output;
	
	
	
	


?>