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
                    <a href="attendence-report.php"><li  id="menu-modules">Attendence for Lecture</li></a>
                    <a href="attendence-by-student.php"><li class="active" id="menu-modules">Attendence by Student</li></a>
                    <li id="menu-account" id="list-right">Change password</li>
                    
                   <?php if(isset($_SESSION['insno'])){
						echo '<a href="logout.php"><li class="active" id="menu-logout">Logout</li></a>';
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
                    
                    	<div style="background-color: #E1E0E0; margin-left: -50px;"><form action="attendence-by-student.php" method="Post" >
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
                    	
if($_POST) 
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
			
			echo '<h1 style="text-decoration: underline;">'.$modcode.' List of Students</h1>';
			
			$sqlmod = "SELECT * FROM stureg WHERE semno = '$semno' AND modcode = '$modcode'";
			$rmod = mysqli_query($dbc, $sqlmod);
			if(mysqli_num_rows($rmod) > 0)
			{
				while($rowmod = mysqli_fetch_array($rmod))
				{
					$stuno = $rowmod['stuno'];
					
					
					$sqlmn = "SELECT * FROM students WHERE stuno = '$stuno'";
					$rmn = mysqli_query($dbc, $sqlmn);
					
						if(mysqli_num_rows($rmn) == 1)
						{
							while($rowmn = mysqli_fetch_array($rmn))
							{
								$stuname = $rowmn['stuname'];
								$stulname = $rowmn['stulname'];
								$stufname = $stuname.' '.$stulname;
							}
						}
						
						echo '<a href="student-report.php?stuno='.$stuno.'&modcode='.$modcode.'" target="_blank"><p style="padding: 5px;">'.$stuno.' - '.$stufname.'</p></a>';
				}
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