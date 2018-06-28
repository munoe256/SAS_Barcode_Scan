<?php
include('config/setup.php');

$sql = "SELECT * FROM departments";
$result = mysqli_query($dbc, $sql);
If (mysqli_num_rows($result) > 0) 
{
			while($row = mysqli_fetch_array($result))
				{
						echo '<option>'.$row['dep'].'</option>';
				}
}

?>