<?php
include('../config/setup.php');

echo '<lable>Programme: </label><select name="stupro" id="stupro">';

$sql = "SELECT * FROM programmes";
$result = mysqli_query($dbc, $sql);
If (mysqli_num_rows($result) > 0) 
{
			while($row = mysqli_fetch_array($result))
				{
						echo '<option value="'.$row['procode'].'">'.$row['procode'].' - '.$row['proname'].'</option>';
				}
}

echo '</select>';
?>