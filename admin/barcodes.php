<html>
<head>

</head>
<body>

<?php


require_once('../barcode-gen/class/BCGFontFile.php');
require_once('../barcode-gen/class/BCGColor.php');
require_once('../barcode-gen/class/BCGDrawing.php');

require_once('../barcode-gen/class/BCGcode39.barcode.php');

include('config/setup.php');

$font = new BCGFontFile('../barcode-gen/font/Arial.ttf', 18);
$colorFront = new BCGColor(0, 0, 0);
$colorBack = new BCGColor(255, 255, 255);

// Barcode Part
$code = new BCGcode39();
$code->setScale(2);
$code->setThickness(30);
$code->setForegroundColor($colorFront);
$code->setBackgroundColor($colorBack);
$code->setFont($font);
$code->setChecksum(false);



$q = "SELECT * FROM students";
$r = mysqli_query($dbc, $q);

if(mysqli_num_rows($r) > 0)
			{
				while($row = mysqli_fetch_array($r))
				{					
					$stuno = $row['stuno'];
					
					
					$q1 = "SELECT * FROM programmes WHERE procode = '$row[stupro]'";
					$r1 = mysqli_query($dbc, $q1);
					
					if(mysqli_num_rows($r1) > 0)
								{
									while($row1 = mysqli_fetch_array($r1))
									{
										$pro = $row1['proname'];
									}	
								}
					$code->parse($stuno);
					echo '<div style="border: 1px solid; width: 350px; height: 150px; padding: 5px; box-sizing: border-box; margin-bottom: 20px;">
							<div style="width: 130px; height:140px; border: 0px solid; box-sizing: border-box; float: left;">
		<img src="../barcode-gen/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text='.$stuno.'&thickness=30&start=NULL&code=BCGcode128" alt="Barcode Image" />
							</div>
							<div style="width: 205px; height:140px; border: 0px solid; box-sizing: border-box; float: left; font-size: 14px; line-height: 25px;">
							'.$row['stuname'].'<br>'.$row['stulname'].'<br>'.$row['stuname'].'<br>'.$pro.'<br>Level: '.$row['level'].'
							</div>
						</div>';  					
				}
			}
?>

</body>
</html>