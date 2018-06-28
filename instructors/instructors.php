<?php
include('config/setup.php');
$todo = '0';
$todo1 = 0;
$lecid = 0;
$moduletoday = 0;
$insnoclasstoday = 'yes';
session_start();

if(!isset($_SESSION['insno'])){
	header('Location: index.php');
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Staff Member</title>
	<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/main.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" media="screen" />
    
    <script src="js/jquery.js"></script> 
	<script src="frontdoor/frontdoor.js"></script>
    
</head>

<body>
		<div id="menu-strip">
        	<div id="logo-container">
            	<img alt="I.U.M logo" src="img/logo.jpg" height="30px"/>
            </div>
            <div id="menu-items-container">
            	<ul>
                	
                	<a href="instructors.php"><li class="active" id="menu-fd">FRONT DOOR</li></a>
                    <a href="excuses.php"><li id="menu-ex">EXCUSES</li></a>
                    <a href="attendence-report.php"><li id="menu-att">Attendence for Lecture</li></a>
                    <a href="attendence-by-student.php"><li id="menu-attby">Attendence by Student</li></a>
                    <li id="menu-account" id="list-right">Change password</li>
                    
                   <?php if(isset($_SESSION['insno'])){
						echo '<a href="logout.php"><li id="menu-logout">Logout</li></a>';
						}
						else
						{
							echo '<a href="index.php"><li id="menu-login">Login</li></a>';	
						}
                    
					
					?>
                </ul>
            </div>
        </div>
        
        <!-- ************************** FRONT DOOR ************************************************** -->
        
        <?php
        	
						
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

        
        ?>
        
        
        
        
        
        <div class="content-area" id="content-area-fd">
        	<div class="side-menu" id="fd-menu">
            	
             <?php
						
						if ($todo == '2' && $insnoclasstoday == 'no')
						{
							echo '<button class="left-pane-buttons" id="fd-setup"><i class="fa fa-save"></i>SETUP</button>
								<button class="left-pane-buttons" id="fd-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                				<button class="left-pane-buttons" id="fd-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
								<input type="text" id="moduleready" value="'.$moduleready.'">
								<input type="text" id="today" value="'.$today.'">
								<input type="text" id="time-s" value="'.$time_s_ready.'">
								<input type="text" id="time-e" value="'.$time_e_ready.'">';
						}
						if ($todo == '1' && $insnoclasstoday == 'no')
						{
							echo '<button class="left-pane-buttons" id="fd-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                					<button class="left-pane-buttons" id="fd-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
									<input type="text" id="moduleready" value="'.$moduleready.'">
									<input type="text" id="today" value="'.$today.'">
									<input type="text" id="time-s" value="'.$time_s_ready.'">
									<input type="text" id="time-e" value="'.$time_e_ready.'">';
						}
					?>
            	
            </div>
            <div class="data-area" id="fd-data">
            	<div class="input-area" id="fd-input-area">
                	<div class="guider" id="fd-guider">
                    	<input class="result" id="fd-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="fd-textboxes">
                    
                    <?php
						if ($todo == '8' && $insnoclasstoday == 'yes')
						{
							echo '<p>You have not been assigned any modules</p>';
						}
						if ($todo == '0' && $insnoclasstoday == 'no')
						{
							echo '<p>You do not have a module at this time today</p>';
						}
						if ($todo == '2' && $insnoclasstoday == 'no')
						{
							echo '<p>Click the setup Button start attendence marker for the module</p>';
						}
						if ($todo1 == 0)
						{
							echo '<p>You do not have modules today</p>';
						}
						if ($todo == '1' && $insnoclasstoday == 'no')
						{
							echo '<table>
                        	<tr>
                            	<td width="100" class="labels">Scan Student Barcode #:</td>
                                <td width="300" id="new-fd-no-input" class="inputs"><input type="text" name="stuno" id="stuno" />
																					<input style="display:none" type="text" value="'.$lecid.'" id="lecid" />
								</td>
								<td><span id="success"></span></td>
                            </tr>
                           
                        </table>';
						}
					?>
                    	
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="fd-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** FRONT DOOR END************************************************** -->
         
        
         
</body>
</html>