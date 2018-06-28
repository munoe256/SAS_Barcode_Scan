<?php
include('config/setup.php');
$lecid = 0;
$moduletoday = 0;
$insnoclasstoday = 'yes';
session_start();

if(!isset($_SESSION['insno'])){
	header('Location: index.php');
}

$cname = 'O';
$nolecture = 'yes';

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IUM | Attendence Report</title>
	<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/main.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" media="screen" />
    
    <script src="js/jquery.js"></script> 
	<script src="frontdoor/frontdoor.js"></script>
    
    <style>
		td {
			height: 30px;
			line-height: 30px;
			
			}
	</style>
</head>

<body>
		<div id="menu-strip">
        	<div id="logo-container">
            	<img alt="I.U.M logo" src="img/logo.jpg" height="30px"/>
            </div>
            <div id="menu-items-container">
            	<ul>
                	
                	<a href="instructors.php"><li id="menu-semesters">FRONT DOOR</li></a>
                    <a href="#"><li class="active" id="menu-programmes">EXCUSES</li></a>
                    <a href="attendence-report.php"><li id="menu-modules">Attendence for Lecture</li></a>
                    <a href="attendence-by-student.php"><li id="menu-modules">Attendence by Student</li></a>
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
        
        
        <div class="content-area" id="content-area-fd" style="border: 0px solid #D5D4D4;">
        	
            <div class="data-area" id="fd-data" style="border: 0px solid #D5D4D4;">
            	<div class="input-area" id="fd-input-area" style="border: 0px solid;">
                	<div class="guider" id="fd-guider">
                    	<input class="result" id="fd-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="fd-textboxes" style="border: 0px solid;">
                    
                    	<div style="background-color: #E1E0E0; margin-left: -50px;"><form action="excuses.php" method="Post" >
                        	<label style="padding: 10px;">Select Module<label><br><br>
                        	<label>Module</label>
                            <select name="select_mod">
      <?php
        	
			$sql = "SELECT * FROM semesters WHERE oc = '$cname'";
			$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno = $row['semno'];
						
				}
			}
				
			$sql = "SELECT * FROM insmod WHERE insno = '$_SESSION[insno]'";
			$result = mysqli_query($dbc, $sql);
			
			if(mysqli_num_rows($result) >=1) 
			{
				while($row = mysqli_fetch_assoc($result))
				{
					
					$modcode = $row['modname'];
					
						$sqlmn = "SELECT * FROM modules WHERE modcode = '$modcode'";
						$rmn = mysqli_query($dbc, $sqlmn);
						
							if(mysqli_num_rows($rmn) == 1)
							{
								while($rowmn = mysqli_fetch_array($rmn))
								{
									$modname = $rowmn['modname'];
								}
							}
					?>
                    
				<option value="<?php echo $modcode;?>"><?php echo $modcode.' - '.$modname;?></option>;	
							
					<?php 
				}
	
			}
			else
			{ ?>
				<option value="NA"><?php echo 'You do not have modules to instruct';?></option>;
	<?php   }


        
        ?>
                            
                            </select>
                            <input type="hidden" value="1" name="submitted">
                            <button type="submit">Search</button>
                        </form></div>
                        
 <?php
                    	
if(isset($_POST['submitted'])) 
{
	$modcode = $_POST['select_mod'];

	$sql = "SELECT * FROM semesters WHERE oc = '$cname'";
			$result = mysqli_query($dbc, $sql);

			if(mysqli_num_rows($result) == 1)
			{
				while($row = mysqli_fetch_array($result))
				{
						$semno = $row['semno'];
						
				}
			}
			
			echo '<h2 style="text-decoration: underline; padding-top: 10px; padding-bottom: 50px;">Excuse for Module '.$modcode.'</h2>';
			
			echo '<form action="excuses.php" method="Post" >
                        	<label for="stuno" ">Student Number<label><br>
							<select  name="stuno" style="height: 30px;">';
							
							$sql = "SELECT * FROM stureg WHERE semno = '$semno' AND modcode = '$modcode'";
							$r = mysqli_query($dbc, $sql);
							if(mysqli_num_rows($r) > 0)
							{
								while($rowz = mysqli_fetch_array($r))
								{
									$stuno = $rowz['stuno'];
									
									
									$sql0 = "SELECT * FROM students WHERE stuno = '$stuno'";
									$r0 = mysqli_query($dbc, $sql0);
									if(mysqli_num_rows($r0) > 0)
									{
										while($rowz0 = mysqli_fetch_array($r0))
										{
											$stuname = $rowz0['stuname'];
											$stulname = $rowz0['stulname'];
											$stufname = $stuname.' '.$stulname;
											
												
											echo '<option value="'.$stuno.'">'.$stuno.' - '.$stufname.'</option>';
										}
									}
											
									
								}
							}
							
							echo '</select><br><br>
                        	<label>Lecture</label><br>
                            <select name="select_lec">';
			
			$sqlmod = "SELECT * FROM lecture WHERE semno = '$semno' AND modcode = '$modcode'";
			$rmod = mysqli_query($dbc, $sqlmod);
			if(mysqli_num_rows($rmod) > 0)
			{
				while($rowmod = mysqli_fetch_array($rmod))
				{
					$ldate = $rowmod['date_of_lecture'];
					$stime = $rowmod['time_s'];
					$etime = $rowmod['time_e'];
					$lecid = $rowmod['id'];
						
						echo '<option value="'.$lecid.'">'.$ldate.' from '.$stime.' to '.$etime.'</option>';
				}
			}
			
		echo '</select><br><br>
                        	<label for="reason">Reason for absence<label><br>
							<textarea name="reason" style="width: 250px; height: 60px;"></textarea><br><br>
                        	<label>Decision</label><br>
                            <select name="select_dec">
								<option value="NOT Valid">NOT Valid</option>
								<option value="Valid">Valid</option>
							</select><br><br>
						
                            <input type="hidden" value="1" name="submittedd">
                            <button type="submit">Save</button>
                        </form';		
}

?>

 <?php
                    	
if(isset($_POST['submittedd'])) 
{
	$lecid = $_POST['select_lec'];
	$stuno = $_POST['stuno'];
	$reason = $_POST['reason'];
	$decision = $_POST['select_dec'];
	
	if($reason == '' || $decision == '' )
	
											{
												echo 'Enter reason and Decision then click the save button</div>
                    
                </div>
                
            </div>
        </div>';
												Exit();
											}
	
									$sql1 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' AND stuno = '$stuno'";
									$r1 = mysqli_query($dbc, $sql1);
									$rno = mysqli_num_rows($r1);
									if(mysqli_num_rows($r1) > 0)
									{
										while($rowz1 = mysqli_fetch_array($r1))
										{
											if($rowz1['status'] == 'P')
											{
												echo 'Student '.$stuno.' was present on day selected</div>
                    
                </div>
                
            </div>
        </div>';
												Exit();
											}
											
											
										}
									}
									else
									{
										echo 'Student '.$stuno.' was not yet registered for this module at the time</div>
                    
                </div>
                
            </div>
        </div>';
												Exit();
									}

			$sql = "UPDATE lecture_attendence SET reason_for_absence = '$reason', decision = '$decision' WHERE lecture_id = '$lecid' AND stuno='$stuno'";
			$result = mysqli_query($dbc, $sql);

			if($result)
			{
				echo 'Excuse successfully saved';
			}
			else
			{
					echo 'excuse not saved';
			}
			
}

?>

                    	
                    </div>
                    
                </div>
                
            </div>
        </div>
        
         <!-- ************************** FRONT DOOR END************************************************** -->
         
        
         
</body>
</html>