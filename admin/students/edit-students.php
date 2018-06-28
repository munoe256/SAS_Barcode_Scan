<?php
include('../config/setup.php');

$id = $_POST['id'];

					$stuno = 'NA';
					$stuname = 'NA';
					$stulname = 'NA';
					$stugender = 'NA';
					$studob = 'NA';
					$stupob = 'NA';
					$stucit = 'NA';
					$stupro = 'NA';
					$stuid = 'NA';
					$stuidt = 'NA';
					$stumob = 'NA';
					$stuphyadd = 'NA';
					$stuposadd = 'NA';
					$stunokname = 'NA';
					$stunokmob = 'NA';
					

$sq = "SELECT * FROM students WHERE id = '$id'";
$resul = mysqli_query($dbc, $sq);

			if(mysqli_num_rows($resul) == 1)
			{
				while($ro = mysqli_fetch_array($resul))
				{
					$stuno = $ro['stuno'];
					$stuname = $ro['stuname'];
					$stulname = $ro['stulname'];
					$stugender = $ro['stugender'];
					
					$studob = $ro['studob'];
					$stupob = $ro['stupob'];
					$stucit = $ro['stucit'];
					$stupro = $ro['stupro'];
					
					$stuid = $ro['stuid'];
					$stuidt = $ro['stuidt'];
					$stucit = $ro['stucit'];
					$stumob = $ro['stumob'];
					
					$stuphyadd = $ro['stuphyadd'];
					$stuposadd = $ro['stuposadd'];
					$stunokname = $ro['stunokname'];
					$stunokmob = $ro['stunokmob'];
				}
			}


echo '<table>
                        	<tr>
                            	<td width="100" class="labels">Student #:</td>
                                <td width="300" id="new-stu-no-input" class="inputs"><input type="text" required name="stuno" id="stuno" disabled value="'.$stuno.'" /></td>
                                <td width="100" class="labels">ID #:</td>
                                <td width="300" class="inputs"><input required type="text" name="stuid" id="stuid" value="'.$stuid.'"/></td>
                               
                            </tr>
                            <tr>
                            	<td width="100" class="labels">First Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="stuname" id="stuname" value="'.$stuname.'" /></td>
                                <td width="100" class="labels">ID Type:</td>
                                <td width="300" class="inputs"><select name="stuidt" id="stuidt">
																	<option value="'.$stuidt.'" selected="selected">'.$stuidt.'</option>
                                									<option>ID DOCUMENT</option>
                                                                    <option>PASSPORT</option>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Last Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="stulname" id="stulname" value="'.$stulname.'"/></td>
                                <td width="100" class="labels">Mobile #:</td>
                                <td width="300" id="new-stu-no-input" class="inputs">
                                													
                                											<input style="width: 100px;" class="mobile" type="number" maxlength="10" value="'.$stumob.'" name="stumno" id="stumno" />
                                
                                </td>
                            </tr>
                             <tr>
                            	<td width="100" class="labels">Gender:</td>
                                <td width="300" class="inputs"><select required type="text" name="stugender" id="stugender">
																	<option value="'.$stugender.'" selected="selected">'.$stugender.'</option>
                                									<option>MALE</option>
                                                                    <option>FEMALE</option>
                                								</select>
                                </td>
                                <td width="100" class="labels">Physical Address:</td>
                                <td width="300" class="inputs"><textarea required name="stuphyadd" id="stuphyadd" >'.$stuphyadd.'</textarea></td>
                               
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">DOB:</td>
                                <td width="300" class="inputs"><input value="'.$studob.'" required type="text" name="studob" id="studob"/></td>
                                <td width="100" class="labels">Postal Address:</td>
                                <td width="300" class="inputs"><textarea required name="stuposadd" id="stuposadd" >'.$stuposadd.'</textarea></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">POB:</td>
                                <td width="300" class="inputs"><input required type="text" name="stupob" id="stupob" value="'.$stupob.'"/></td>
                                <td width="100" class="labels">NOK Fullname:</td>
                                <td width="300" class="inputs"><input type="text" required name="stunokname" id="stunokname" value="'.$stunokname.'"/></td>
                                
                            </tr>
                            <tr>

                            	<td width="100" class="labels">Citizenship:</td>
                                <td width="300" class="inputs"><select name="stucit" id="stucit">
																	<option value="'.$stucit.'" selected="selected">'.$stucit.'</option>
                                									<option>NAMIBIAN</option>
                                                                    <option>ANGOLAN</option>
                                								</select></td>
                               <td width="100" class="labels">NOK Mobile #:</td>
                                 <td width="300" id="new-stu-no-input" class="inputs">
                                													
                                										<input style="width: 100px;" class="mobile" type="number" maxlength="10" name="stunokmno" id="stunokmno" value="'.$stumob.'"/>
                                
                                </td>
                            </tr>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                           
                            
                        </table>
                        <div id="stuprocont">
                        	<lable>Programme: </label>
                            								<select name="stupro" id="stupro">
                                								';
$sql = "SELECT * FROM programmes";
$result = mysqli_query($dbc, $sql);
If (mysqli_num_rows($result) > 0) 
{
			while($row = mysqli_fetch_array($result))
				{
						echo '<option value="'.$row['procode'].'">'.$row['procode'].' - '.$row['proname'].'</option>';
						if($row['procode'] == $stupro)
						{
							$stuproname = $row['proname'];
						}
				}
}
																	
																	
                                                                 
                                								echo '<option value="'.$stupro.'" selected="selected">'.$stupro.' - '.$stuproname.'</option></select>
																
																
																
						</div>
						';
?>