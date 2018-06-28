<?php
include('../config/setup.php');
$cname = 'O';
$mod = $_POST['mod'];
$today = $_POST['today'];
$times = $_POST['times'];
$timee = $_POST['timee'];

        	
						
			$sql = "SELECT * FROM insmod WHERE insno = '$_SESSION[insno]'";
			$result = mysqli_query($dbc, $sql);
			
			if(mysqli_num_rows($result) >=1) {
				while($row = mysqli_fetch_assoc($result))
				{
					
					$modcode = $row['modname'];
					$today = date('Y-m-d');
					$weekday = date('l', strtotime($today));
					
					$sql1 = "SELECT * FROM timetable WHERE modcode = '$modcode' AND the_day = '$weekday'";
					$result1 = mysqli_query($dbc, $sql1);
					
						if(mysqli_num_rows($result1) >= 1) {
							
							while($row1 = mysqli_fetch_assoc($result1))
							{
								$time_s = $row1['the_time_s'];
								$time_e = $row1['the_time_e'];
								
								$ct = date("H:i:s");
								$insnoclasstoday = 'no';
								if($time_s <= $ct && $time_e >$ct){
									
									$sql2 = "SELECT * FROM lecture WHERE modcode = '$modcode' AND date_of_lecture = '$today' AND time_s = '$time_s' AND time_e = '$time_e'";
									$result2 = mysqli_query($dbc, $sql2);
									
										if(mysqli_num_rows($result2) > 0) 
										{
											while($row2 = mysqli_fetch_assoc($result2)){
												$lecid = $row2['id'];
											}
											$todo = '1';
											$moduleready = $modcode;
											$time_s_ready = $row1['the_time_s'];
											$time_e_ready = $row1['the_time_e'];
										}
										else
										{
											$todo = '2';
											$moduleready = $modcode;
											$time_s_ready = $row1['the_time_s'];
											$time_e_ready = $row1['the_time_e'];
										}
								}
								
							}
							
							$todo1 = $todo1 + 1;
						}
						
					
				}
			}
			else
			{
			$todo = '8'; //instructor has no modules to instruct	
			}

        
        





$sql = "SELECT * FROM semesters WHERE oc = '$cname'";
$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno = $row['semno'];
						
				}
			}

$sql1 = "INSERT INTO lecture (date_of_lecture, time_e, time_s, modcode, semno) VALUES('$today', '$timee', '$times', '$mod', '$semno')";
$result1 = mysqli_query($dbc, $sql1);

if(!$result1)
{
	echo 'Error:Could not setup lecture';
	Exit()	;
}

$sql0 = "SELECT * FROM lecture WHERE modcode = '$mod' AND semno = '$semno' ORDER BY id DESC";
$result0 = mysqli_query($dbc, $sql0);

	if(mysqli_num_rows($result0) >= 1)
	{
			$noofloop = 0;
			while($row0 = mysqli_fetch_array($result0))
				{
					if($noofloop ==0)
					{
						$lecid = $row0['id'];
						$noofloop = $noofloop + 1;
					}
				}
	}

$sql2 = "SELECT * FROM stureg WHERE modcode = '$mod' AND semno = '$semno'";
$result2 = mysqli_query($dbc, $sql2);

			if(mysqli_num_rows($result2) >= 1)
			{
				
				while($row2 = mysqli_fetch_array($result2))
				{
						
					$sql3 = "INSERT INTO lecture_attendence (lecture_id, stuno) VALUES('$lecid', '$row2[stuno]')";
					$result3 = mysqli_query($dbc, $sql3);
								
								if(!$result3)
								{
									echo 'Some students were NOT setup for this class';
								}
		
				}
			}
echo '

<div class="side-menu" id="fd-menu">
 	<button class="left-pane-buttons" id="fd-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
    <button class="left-pane-buttons" id="fd-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
</div>
<div class="data-area" id="fd-data">

<div class="input-area" id="fd-input-area">
                	<div class="guider" id="fd-guider">
                    	<input class="result" id="fd-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="fd-textboxes">
					<table>
                        	<tr>
                            	<td width="100" class="labels">Scan Student Barcode #:</td>
                                <td width="300" id="new-fd-no-input" class="inputs"><input type="text" name="stuno" id="stuno" />
																					<input style="display:none" type="text" value="'.$lecid.'" id="lecid" /> 
								</td>
								<td><span id="success"></span></td>
                            </tr>
                           
                        </table>
						
						</div>
                    
                </div>
				<div class="data-grid" id="fd-data-grid">
                </div>
  </div>';
?>