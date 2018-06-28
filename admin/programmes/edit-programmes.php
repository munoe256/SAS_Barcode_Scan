<?php
include('../config/setup.php');

$id = $_POST['id'];

					$proname = 'NA';
					$procode = 'NA';
					$profac = 'NA';
					$pronotes = 'NA';
					

$sq = "SELECT * FROM programmes WHERE id = '$id'";
$resul = mysqli_query($dbc, $sq);

			if(mysqli_num_rows($resul) == 1)
			{
				while($ro = mysqli_fetch_array($resul))
				{
					$proname = $ro['proname'];
					$procode = $ro['procode'];
					$profac = $ro['profac'];
					$pronotes = $ro['pronotes'];
				}
			}


echo '<table>
                        	
                            <tr>
                            	<td width="100" class="labels">Programme code:</td>
                                <td width="300" class="inputs"><input type="text" required name="procode" id="procode" value="'.$procode.'" disabled/></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Programme name:</td>
                                <td width="300" class="inputs"><input type="text" required name="proname" id="proname" value="'.$proname.'"/>
                                </td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Faculty:</td>
                                <td width="300" class="inputs"><select required type="text" name="profac" id="profac">
																		<option value="'.$profac.'" selected="selected">'.$profac.'</option>
                                                                        <option>Science and Technology</option>
                                                                        <option>Commerce</option>
                                                                        <option>Arts</option>
                                								</select>
                                </td>
                            </tr>
                            
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="pronotes" id="pronotes">'.$pronotes.'</textarea></td>
                            </tr>
                        </table>
						
						
						';
						
						
?>