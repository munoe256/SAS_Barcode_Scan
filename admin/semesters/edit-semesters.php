<?php
include('../config/setup.php');

$id = $_POST['id'];

					$semno = 'NA';
					$semcode = 'NA';
					$semsdate = 'NA';
					$semedate = 'NA';
					$semnotes = 'NA';

$sq = "SELECT * FROM semesters WHERE counter = '$id'";
$resul = mysqli_query($dbc, $sq);

			if(mysqli_num_rows($resul) == 1)
			{
				while($ro = mysqli_fetch_array($resul))
				{
					$semno = $ro['semno'];
					$semcode = $ro['semcode'];
					$semsdate = $ro['sdate'];
					$semedate = $ro['edate'];
					$semnotes = $ro['notes'];
				}
			}


echo '<table>
                        	<tr>
                            	<td width="100" class="labels">Semester #:</td>
                                <td width="300" id="new-sem-no-input" class="inputs"><input type="number" contentnoteditable required name="semno" value= "'.$semno.'" disabled id="semno" /></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Semester code:</td>
                                <td width="300" class="inputs"><input type="text" value= "'.$semcode.'" required name="semcode" id="semcode" /></td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Start date:</td>
                                <td width="300" class="inputs"><label style="font-size: 10px; padding-left: 10px; color: blue;">'.$semsdate.'</label><input  min="2016-01-01" max="2017-12-31" required type="date" name="semsdate" id="semsdate"/></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">End date:</td>
                                <td width="300" class="inputs"><label style="font-size: 10px; padding-left: 10px; color: blue;">'.$semedate.'</label><input min="2016-01-01" max="2017-12-31" required type="date" name="semedate" id="semedate" /></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="semnotes" id="semnotes">'.$semnotes.'</textarea></td>
                            </tr>
                        </table>
						
						
						';
						
						
?>