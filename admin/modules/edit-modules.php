<?php
include('../config/setup.php');

$id = $_POST['id'];

					$modname = 'NA';
					$modcode = 'NA';
					$moddep = 'NA';
					$modnotes = 'NA';
					

$sq = "SELECT * FROM modules WHERE id = '$id'";
$resul = mysqli_query($dbc, $sq);

			if(mysqli_num_rows($resul) == 1)
			{
				while($ro = mysqli_fetch_array($resul))
				{
					$modname = $ro['modname'];
					$modcode = $ro['modcode'];
					$moddep = $ro['moddep'];
					$modnotes = $ro['modnotes'];
				}
			}


echo '<table>             	
                            <tr>
                            	<td width="100" class="labels">Module code:</td>
                                <td width="300" class="inputs"><input type="text" required name="modcode" id="modcode" disabled value="'.$modcode.'"/></td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Module name:</td>
                                <td width="300" class="inputs"><input required type="text" name="modname" id="modname" value="'.$modname.'"/></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Department:</td>
                                <td width="300" class="inputs"><select required type="text" name="moddep" id="moddep">
																	<option value="'.$moddep.'" selected="selected">'.$moddep.'</option>
                                									<option>BUSINESS INFORMATION SYSTEMS</option>
                                                                    <option>AFRICAN LANGUAGES</option>
                                                                    <option>ECONOMICS</option>
                                								</select>
                                </td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="modnotes" id="modnotes">'.$modnotes.'</textarea></td>
                            </tr>
                        </table>
						';
						
						
?>