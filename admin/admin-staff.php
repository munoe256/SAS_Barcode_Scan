<?php

session_start();

if(!isset($_SESSION['staffno'])){
	header('Location: index.php');
}
if(!isset($_SESSION['admin'])){
	header('Location: index.php');
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IUM - Admin</title>
	<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/main.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" media="screen" />
    
    <script src="js/jquery.js"></script> 
	<script src="semesters/semesters.js"></script>
    <script src="programmes/programmes.js"></script>
    <script src="modules/modules.js"></script>
    <script src="students/students.js"></script>
    <script src="instructors/instructors.js"></script>
    <script src="promod/promod.js"></script>
    <script src="insmod/insmod.js"></script>
    <script src="stureg/stureg.js"></script>
    <script src="timetable/timetable.js"></script>
   
</head>

<body style="background-image:url(img/logo.jpg); background:repeat;">
		<div id="menu-strip">
        	<div id="logo-container">
            	<img alt="I.U.M logo" src="img/logo.jpg" height="30px"/>
            </div>
            <div id="menu-items-container">
            	<ul>
                	<li id="menu-semesters" class="menu-semesters">SEMESTERS</li>
                    <li id="menu-programmes">PROGRAMMES</li>
                    <li id="menu-modules">MODULES</li>
                    <li id="menu-students">STUDENTS</li>
                    <li id="menu-instructors">INSTRUCTORS</li>
                    <li id="menu-promod">PRO-MOD</li>
                    <li id="menu-insmod">INS-MOD</li>
                    <li id="menu-stureg">STU-REG</li>
                    <li id="menu-timetable">T-TABLE</li>
                    <a href="logout.php"><li id="menu-account" id="list-right">Logout</li></a>
                </ul>
            </div>
        </div>
        <!-- ************************** welcome ************************************************** -->
        <div id="welcome" style="background-image:url(img/ium-logo.png); height: 192px; width:597px; margin: 100px auto 0px auto;"></div>
        <!-- ************************** SEMESTERS ************************************************** -->
        
        <div class="content-area" id="content-area-sem">
        	<div class="side-menu" id="sem-menu">
            	<button class="left-pane-buttons" id="sem-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="sem-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="save-sem-changes"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="sem-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="sem-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="sem-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="sem-data">
            	<div class="input-area" id="sem-input-area">
                	<div class="guider" id="sem-guider">
                    	<input class="result" id="sem-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="sem-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Semester #:</td>
                                <td width="300" id="new-sem-no-input" class="inputs"><input type="number" contentnoteditable required name="semno" id="semno" /></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Semester code:</td>
                                <td width="300" class="inputs"><input type="text" required name="semcode" id="semcode" /></td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Start date:</td>
                                <td width="300" class="inputs"><input  min="2016-01-01" max="2017-12-31" required type="date" name="semsdate" id="semsdate"/></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">End date:</td>
                                <td width="300" class="inputs"><input min="2016-01-01" max="2017-12-31" required type="date" name="semedate" id="semedate" /></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="semnotes" id="semnotes"></textarea></td>
                            </tr>
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="sem-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** SEMESTERS END************************************************** -->
         
         <!-- ************************** PROGRAMMES ************************************************** -->
        
        <div class="content-area" id="content-area-pro">
        	<div class="side-menu" id="pro-menu">
            	<button class="left-pane-buttons" id="pro-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="pro-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="pro-save-changes"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="pro-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="pro-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="pro-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="pro-data">
            	<div class="input-area" id="pro-input-area">
                	<div class="guider" id="pro-guider">
                    	<input class="result" id="pro-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="pro-textboxes">
                    
                    	<table>
                        	
                            <tr>
                            	<td width="100" class="labels">Programme code:</td>
                                <td width="300" class="inputs"><input type="text" required name="procode" id="procode" /></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Programme name:</td>
                                <td width="300" class="inputs"><input type="text" required name="proname" id="proname" />
                                </td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Faculty:</td>
                                <td width="300" class="inputs"><select required type="text" name="profac" id="profac">
                                									
                                                                        <option>Science and Technology</option>
                                                                        <option>Commerce</option>
                                                                        <option>Arts</option>
                                                                    
                                								</select>
                                </td>
                            </tr>
                            
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="pronotes" id="pronotes"></textarea></td>
                            </tr>
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="pro-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** PROGRAMMES END************************************************** -->
         <!-- ************************** MODULES ************************************************** -->
        
        <div class="content-area" id="content-area-mod">
        	<div class="side-menu" id="mod-menu">
            	<button class="left-pane-buttons" id="mod-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="mod-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="mod-save-changes"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="mod-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="mod-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="mod-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="mod-data">
            	<div class="input-area" id="mod-input-area">
                	<div class="guider" id="mod-guider">
                    	<input class="result" id="mod-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="mod-textboxes">
                    
                    	<table>
                        	
                            <tr>
                            	<td width="100" class="labels">Module code:</td>
                                <td width="300" class="inputs"><input type="text" required name="modcode" id="modcode" /></td>
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Module name:</td>
                                <td width="300" class="inputs"><input required type="text" name="modname" id="modname"/></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Department:</td>
                                <td width="300" class="inputs"><select required type="text" name="moddep" id="moddep">
                                									<option>BUSINESS INFORMATION SYSTEMS</option>
                                                                    <option>AFRICAN LANGUAGES</option>
                                                                    <option>ECONOMICS</option>
                                								</select>
                                </td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Notes:</td>
                                <td width="300" class="inputs"><textarea type="text" name="modnotes" id="modnotes"></textarea></td>
                            </tr>
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="mod-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** MODULES END************************************************** -->
         <!-- ************************** STUDENTS ************************************************** -->
        
        <div class="content-area" id="content-area-stu">
        	<div class="side-menu" id="stu-menu">
            	<button class="left-pane-buttons" id="stu-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="stu-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="stu-save-changes"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="stu-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="stu-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="stu-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
                <a style="text-decoration: none;" href="barcodes.php" target="_blank"><button style="margin-top: 250px; display: block;" class="left-pane-buttons" id="stu-logout"><i class="fa fa-sign-ou"></i>Barcodes</button></a>
            </div>
            <div class="data-area" id="stu-data">
            	<div class="input-area" id="stu-input-area">
                	<div class="guider" id="stu-guider">
                    	<input class="result" id="stu-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="stu-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Student #:</td>
                                <td width="300" id="new-stu-no-input" class="inputs"><input type="text" required name="stuno" id="stuno" /></td>
                                <td width="100" class="labels">ID #:</td>
                                <td width="300" class="inputs"><input required type="text" name="stuid" id="stuid" /></td>
                               
                            </tr>
                            <tr>
                            	<td width="100" class="labels">First Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="stuname" id="stuname" /></td>
                                <td width="100" class="labels">ID Type:</td>
                                <td width="300" class="inputs"><select name="stuidt" id="stuidt">
                                									<option>ID DOCUMENT</option>
                                                                    <option>PASSPORT</option>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Last Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="stulname" id="stulname" /></td>
                                <td width="100" class="labels">Mobile #:</td>
                                <td width="300" id="new-stu-no-input" class="inputs">
                                													<select class="mobile" type="text" name="stumo" id="stumo">
                                                                                        <option>081</option>
                                                                                        <option>085</option>
                                                                                    </select>
                                											<input class="mobile" type="text" maxlength="7" name="stumno" id="stumno" />
                                
                                </td>
                            </tr>
                             <tr>
                            	<td width="100" class="labels">Gender:</td>
                                <td width="300" class="inputs"><select required type="text" name="stugender" id="stugender">
                                									<option>MALE</option>
                                                                    <option>FEMALE</option>
                                								</select>
                                </td>
                                <td width="100" class="labels">Physical Address:</td>
                                <td width="300" class="inputs"><textarea required name="stuphyadd" id="stuphyadd" ></textarea></td>
                               
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Date of Birth:</td>
                                <td width="300" class="inputs"><input  min="2016-01-01" max="2017-12-31" required type="date" name="studob" id="studob"/></td>
                                <td width="100" class="labels">Postal Address:</td>
                                <td width="300" class="inputs"><textarea required name="stuposadd" id="stuposadd" ></textarea></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Place of Birth:</td>
                                <td width="300" class="inputs"><input required type="text" name="stupob" id="stupob" /></td>
                                <td width="100" class="labels">Next of Kin Fullname:</td>
                                <td width="300" class="inputs"><input type="text" required name="stunokname" id="stunokname" /></td>
                                
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Citizenship:</td>
                                <td width="300" class="inputs"><select name="stucit" id="stucit">
                                									
                                                                    <option>ANGOLA</option>
																	<option>CAMERON</option>
																	<option>DRC</option>
																	<option>EGYPT</option>
																	<option>GHANA</option>
																	<option>GERMANY</option>
																	<option>NAMIBIA</option>
																	<option>NIGERIA</option>
																	<option>SOUTH AFRICA</option>
																	<option>ZAMBIA</option>
																	<option>ZIMBABWE</option>
																	
                                								</select></td>
                               <td width="100" class="labels">Next of Kin Mobile #:</td>
                                 <td width="300" id="new-stu-no-input" class="inputs">
                                													<select class="mobile" required type="text" name="stunokmo" id="stunokmo">
                                                                                        <option>081</option>
                                                                                        <option>085</option>
																						<option> 061 </option>
                                                                                    </select>
                                										<input class="mobile" type="number" maxlength="7" name="stunokmno" id="stunokmno" />
                                
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
                                								
                                									<?php
																	
																	include('students/get-programmes.php');
																	
																	?>
                                                                 
                                								</select>
                    	</div>
                    </div>
                    
                </div>
                <div class="data-grid" id="stu-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** STUDENTS END************************************************** -->
         <!-- ************************** INSTRUCTORS************************************************** -->
        
        <div class="content-area" id="content-area-ins">
        	<div class="side-menu" id="ins-menu">
            	<button class="left-pane-buttons" id="ins-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="ins-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="ins-save-edit"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="ins-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="ins-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="ins-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="ins-data">
            	<div class="input-area" id="ins-input-area">
                	<div class="guider" id="ins-guider">
                    	<input class="result" id="ins-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="ins-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Instructor #:</td>
                                <td width="300" id="new-stu-no-input" class="inputs"><input type="text" required name="insno" id="insno" /></td>
                                <td width="100" class="labels">ID #:</td>
                                <td width="300" class="inputs"><input required type="text" name="insid" id="insid" /></td>
                               
                            </tr>
                            <tr>
                            	<td width="100" class="labels">First Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="insname" id="insname" /></td>
                                <td width="100" class="labels">ID Type:</td>
                                <td width="300" class="inputs"><select name="insidt" id="insidt">
                                									<option>ID DOCUMENT</option>
                                                                    <option>PASSPORT</option>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Last Name:</td>
                                <td width="300" class="inputs"><input type="text" required name="inslname" id="inslname" /></td>
                                <td width="100" class="labels">Mobile #:</td>
                                <td width="300" id="new-ins-no-input" class="inputs">
                                													<select class="mobile" type="text" name="insmo" id="insmo">
                                                                                        <option>081</option>
                                                                                        <option>085</option>
																					<option> 061 </option>
                                                                                    </select>
                                											<input class="mobile" type="text" maxlength="7" name="insmno" id="insmno" />
                                
                                </td>
                            </tr>
                             <tr>
                            	<td width="100" class="labels">Gender:</td>
                                <td width="300" class="inputs"><select required type="text" name="insgender" id="insgender">
                                									<option>MALE</option>
                                                                    <option>FEMALE</option>
                                								</select>
                                </td>
                                <td width="100" class="labels">Physical Address:</td>
                                <td width="300" class="inputs"><textarea required name="insphyadd" id="insphyadd" ></textarea></td>
                               
                            </tr>
                        	<tr>
                            	<td width="100" class="labels">Date of Birth:</td>
                                <td width="300" class="inputs"><input  min="2016-01-01" max="2017-12-31" required type="date" name="insdob" id="insdob"/></td>
                                <td width="100" class="labels">Postal Address:</td>
                                <td width="300" class="inputs"><textarea required name="insposadd" id="insposadd" ></textarea></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Place of Birth:</td>
                                <td width="300" class="inputs"><input required type="text" name="inspob" id="inspob" /></td>
                                <td width="100" class="labels">Next of Kin Fullname:</td>
                                <td width="300" class="inputs"><input type="text" required name="insnokname" id="insnokname" /></td>
                                
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Citizenship:</td>
                                <td width="300" class="inputs"><select name="inscit" id="inscit">
                                									<option>ANGOLA</option>
																	<option>CAMERON</option>
																	<option>DRC</option>
																	<option>EGYPT</option>
																	<option>GHANA</option>
																	<option>GERMANY</option>
																	<option>NAMIBIA</option>
																	<option>NIGERIA</option>
																	<option>SOUTH AFRICA</option>
																	<option>ZAMBIA</option>
																	<option>ZIMBABWE</option>                                								</select></td>
                               <td width="100" class="labels">Next of Kin Mobile #:</td>
                                 <td width="300" id="new-ins-no-input" class="inputs">
                                													<select class="mobile" required type="text" name="insnokmo" id="insnokmo">
                                                                                        <option>081</option>
                                                                                        <option>085</option>
																						<option> 061 </option>
                                                                                    </select>
                                										<input class="mobile" type="number" maxlength="7" name="insnokmno" id="insnokmno" />
                                
                                </td>
                            </tr>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                                <td><hr class="liner"></td>
                            <tr>
                            	<td width="100" class="labels">Department:</td>
                                <td width="300" class="inputs"><select name="insdep" id="insdep">
                                									<?php
																	
																	include('instructors/get-departments.php');
																	
																	?>
                                								</select></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                            	
                            </tr>
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="ins-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** INSTRUCTORS END************************************************** -->
          <!-- ************************** PRO MOD ************************************************** -->
        
        <div class="content-area" id="content-area-promod">
        	<div class="side-menu" id="promod-menu">
            	<button class="left-pane-buttons" id="promod-search"><i class="fa fa-search"></i>SEARCH</button>
            	<button class="left-pane-buttons" id="promod-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="promod-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="promod-save-edit"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="promod-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="promod-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="promod-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="promod-data">
            	<div class="input-area" id="promod-input-area">
                	<div class="guider" id="promod-guider">
                    	<input class="result" id="promod-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="promod-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Programme:</td>
                                <td width="300" class="inputs"><select name="promodpro" id="promodpro">
                                									<?php
																	
																	include('students/get-programmes.php');
																	
																	?>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Module:</td>
                                <td width="300" class="inputs"><select name="promodmod" id="promodmod">
                                									<?php
																	
																	include('promod/get-modules.php');
																	
																	?>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Level:</td>
                            	<td width="300" class="inputs"><select name="promodlev" id="promodlev">
                                									<option>1.1</option>
                                                                    <option>1.2</option>
                                                                    <option>2.1</option>
                                                                    <option>2.2</option>
                                                                    <option>3.1</option>
                                                                    <option>3.2</option>
                                                                    <option>4.1</option>
                                                                    <option>4.2</option>
                                								</select></td>
                            </tr>
                        	
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="promod-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** PRO MOD END************************************************** -->
         <!-- ************************** INS MOD ************************************************** -->
        
        <div class="content-area" id="content-area-insmod">
        	<div class="side-menu" id="insmod-menu">
            	<button class="left-pane-buttons" id="insmod-search"><i class="fa fa-search"></i>SEARCH</button>
            	<button class="left-pane-buttons" id="insmod-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="insmod-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="insmod-save-edit"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="insmod-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="insmod-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="insmod-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="insmod-data">
            	<div class="input-area" id="insmod-input-area">
                	<div class="guider" id="insmod-guider">
                    	<input class="result" id="insmod-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="insmod-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Instructor:</td>
                                <td width="300" class="inputs"><select name="insmodins" id="insmodins">
                                									<?php
																	
																	include('insmod/get-instructors.php');
																	
																	?>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Module:</td>
                                <td width="300" class="inputs"><select name="insmodmod" id="insmodmod">
                                									<?php
																	
																	include('promod/get-modules.php');
																	
																	?>
                                								</select></td>
                            </tr>
                                                    	
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="insmod-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** INS MOD END************************************************** -->
         <!-- ************************** STU REG ************************************************** -->
        
        <div class="content-area" id="content-area-stureg">
        	<div class="side-menu" id="stureg-menu">
            	<button class="left-pane-buttons" id="stureg-search"><i class="fa fa-search"></i>SEARCH</button>
            	<button class="left-pane-buttons" id="stureg-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="stureg-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="stureg-save-edit"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="stureg-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="stureg-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="stureg-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="stureg-data">
            	<div class="input-area" id="stureg-input-area">
                	<div class="guider" id="stureg-guider">
                    	<input class="result" id="stureg-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="stureg-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Student:</td>
                                <td width="300" class="inputs"><input type="text" name="sturegstu1" id="sturegstu1" />
                                								<select name="sturegstu2" id="sturegstu2">
                                									<?php
																	
																	include('stureg/get-students.php');
																	
																	?>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Semester #:</td>
                                <td width="300" id="new-sem-no-input" class="inputs">
                                									<?php
																	
																	include('stureg/get-current-sem.php');
																	
																	?>
                                
                                </td>
                            </tr>
                                                    	
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="stureg-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** STU REG END************************************************** -->
         <!-- ************************** TIMETABLE ************************************************** -->
        
        <div class="content-area" id="content-area-timetable">
        	<div class="side-menu" id="timetable-menu">
            	<button class="left-pane-buttons" id="timetable-search"><i class="fa fa-search"></i>SEARCH</button>
            	<button class="left-pane-buttons" id="timetable-save-new"><i class="fa fa-save"></i>SAVE</button>
            	<button class="left-pane-buttons" id="timetable-add-new"><i class="fa fa-plus-circle"></i>NEW</button>
                <button class="left-pane-buttons" id="timetable-save-edit"><i class="fa fa-save"></i>SAVE</button>
                <button class="left-pane-buttons" id="timetable-clear"><i class="fa fa-eraser"></i>CLEAR</button>
                <button class="left-pane-buttons" id="timetable-refresh"><i class="fa fa-refresh"></i>REFRESH</button>
                <button class="left-pane-buttons" id="timetable-logout"><i class="fa fa-sign-out"></i>LOGOUT</button>
            </div>
            <div class="data-area" id="timetable-data">
            	<div class="input-area" id="timetable-input-area">
                	<div class="guider" id="timetable-guider">
                    	<input class="result" id="timetable-result" type="text" />
                    </div>
                    <div class="textboxes-container" id="timetable-textboxes">
                    
                    	<table>
                        	<tr>
                            	<td width="100" class="labels">Module:</td>
                                <td width="300" class="inputs">
                                								<select name="timetablemod" id="timetablemod">
                                									<?php
																	
																	include('promod/get-modules.php');
																	
																	?>
                                								</select></td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Day:</td>
                                <td width="300" id="new-sem-no-input" class="inputs">
                                									
																<select name="timetableday" id="timetableday">
                                                                    
																	<option>Monday</option>
                                                                    <option>Tuesday</option>
                                                                    <option>Wednesday</option>
                                                                    <option>Thursday</option>
                                                                    <option>Friday</option>
                                                                    <option>Saturday</option>
                                                                    
																</select>
                                </td>
                            </tr>
                            <tr>
                            	<td width="100" class="labels">Time:</td>
                                <td width="300" id="new-sem-no-input" class="inputs">
                                									
																<select name="timetabletime" id="timetabletime">
                                                                    
																	<option value="08-10">08H - 10H</option>
                                                                    <option value="10-12">10H - 12H</option>
                                                                    <option value="12-14">12H - 14H</option>
                                                                    <option value="14-16">14H - 16H</option>
                                                                    <option value="16-18">16H - 18H</option>
                                                                    
																</select>
                                </td>
                            </tr>
                                                    	
                        </table>
                    	
                    </div>
                    
                </div>
                <div class="data-grid" id="timetable-data-grid">
                </div>
            </div>
        </div>
        
         <!-- ************************** TIMETABLE END************************************************** -->
         
</body>
</html>