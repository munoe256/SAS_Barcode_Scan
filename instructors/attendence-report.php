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
                    <a href="excuses.php"><li id="menu-programmes">EXCUSES</li></a>
                    <a href="attendence-report.php"><li class="active" id="menu-modules">Attendence for Lecture</li></a>
                    <a href="attendence-by-student.php"><li  id="menu-modules">Attendence by Student</li></a>
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
                    
                    	<div style="background-color: #E1E0E0; margin-left: -50px;"><form action="attendence-report.php" method="Post" >
                        	<label style="padding: 10px;">Select Lecture<label><br><br>
                        	<label>lecture</label>
                            <select name="select_lecid">
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
					
					$sql1 = "SELECT * FROM lecture WHERE modcode = '$modcode' AND semno = '$semno'";
					$result1 = mysqli_query($dbc, $sql1);
					
						if(mysqli_num_rows($result1) >= 1) 
						{
							
							while($row1 = mysqli_fetch_assoc($result1))
							{
								$lecid = $row1['id'];
								$time_s = $row1['time_s'];
								$time_e = $row1['time_e'];
								$lecdate = $row1['date_of_lecture']; ?>
								
								
								<option value="<?php echo $lecid;?>"><?php echo $lecid.' - '.$modcode.' - '.$lecdate.' ----- from '.$time_s.' to '.$time_e;?></option>;
								
						<?php		$nolecture = 'no';
						}
								
						}
						
								
					
							
							
				}
				
				if($nolecture == 'yes')
				{ ?>
					<option value="NA"><?php echo 'You have not instructed any of your modules this semester';?></option>;
			<?php }
						
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
                    	
if($_POST) 
{
	$lecid = $_POST['select_lecid'];
	$p = 'P';
	$a = 'A';
	
			$sqlmod = "SELECT * FROM lecture WHERE id = '$lecid'";
			$rmod = mysqli_query($dbc, $sqlmod);
			if(mysqli_num_rows($rmod) == 1)
			{
				while($rowmod = mysqli_fetch_array($rmod))
				{
					$modcode = $rowmod['modcode'];
					$ldate = $rowmod['date_of_lecture'];
					$stime = $rowmod['time_s'];
					$etime = $rowmod['time_e'];
					
					$sqlmn = "SELECT * FROM modules WHERE modcode = '$modcode'";
					$rmn = mysqli_query($dbc, $sqlmn);
					
						if(mysqli_num_rows($rmn) == 1)
						{
							while($rowmn = mysqli_fetch_array($rmn))
							{
								$modname = $rowmn['modname'];
							}
						}
				}
			}
			
	
	echo '<h1 style="margin-top: 20px; text-decoration: underline;">Module : '.$modname.'</h1>
		<h1 style="margin-top: 5px;">Date : '.$ldate.'</h1>
		<h1 style="margin-top: 5px;">Start Time - '.$stime.'</h1>
		<h1 style="margin-top: 5px;">End Time - '.$etime.'</h1>
		<p style="margin-top: 20px; text-decoration: underline;">Present Students</p>
	
	<table>
			<tr style="background-color: #E1E0E0;">
								<td width="150px">Student Number</td>
								<td width="120px">Firstname</td>
								<td width="120px">Lastname</td>
										
							</tr>';

			$sql5 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' and status = '$p'";
			$result5 = mysqli_query($dbc, $sql5);

			if(mysqli_num_rows($result5) > 0)
			{
				while($row5 = mysqli_fetch_array($result5))
				{
					
					$sql1 = "SELECT * FROM students WHERE stuno = '$row5[stuno]'";
					$result1 = mysqli_query($dbc, $sql1);
					
					if(mysqli_num_rows($result1) == 1)
						{
							while($row1 = mysqli_fetch_array($result1))
							{
					
						echo '<tr ><td>'.$row5["stuno"].'</td>
								<td>'.$row1["stuname"].'</td>
								<td>'.$row1["stulname"].'</td>
								</tr>
								';	
							}
						}		
				}
			}
			else
			{
				echo '<tr><td colspan="3"></td></tr>';
			}
			
	echo '</table>';
	//absent students
	
	echo '<p style="margin-top: 50px; text-decoration: underline;"">Absent Students</p>
	
	<table>
			<tr style="background-color: #E1E0E0;">
								<td width="150px">Student Number</td>	
								<td width="120px">Firstname</td>
								<td width="120px">Lastname</td>
									
							</tr>';
	
	$sql5 = "SELECT * FROM lecture_attendence WHERE lecture_id = '$lecid' and status = '$a'";
			$result5 = mysqli_query($dbc, $sql5);

			if(mysqli_num_rows($result5) > 0)
			{
				while($row5 = mysqli_fetch_array($result5))
				{
					
					$sql1 = "SELECT * FROM students WHERE stuno = '$row5[stuno]'";
					$result1 = mysqli_query($dbc, $sql1);
					
					if(mysqli_num_rows($result1) == 1)
						{
							while($row1 = mysqli_fetch_array($result1))
							{
					
						echo '<tr><td>'.$row5["stuno"].'</td>
								<td>'.$row1["stuname"].'</td>
								<td>'.$row1["stulname"].'</td>
								</tr>
								';	
							}
						}
					
					
						
						
				}
			}
			else
			{
				echo '<tr><td colspan="3">No student was absent</td></tr>';
			}
			
			echo '</table>';
}

?>

                    	
                    </div>
                    
                </div>
                
            </div>
        </div>
        
         <!-- ************************** FRONT DOOR END************************************************** -->
         
        
         
</body>
</html>