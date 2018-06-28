<?php
include('config/setup.php');
//include('config/check.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Debits</title>
<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/d.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="screen" />
<link href="Font-Awesome-master/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/menu.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body style="background-color:#F9F9F9;">

<div id="header-strip">
	<div id="header-strip-container">
    	<!--<div id="blue">Freedom </div>
        <div id="red">Solidarity</div>
        <div id="green">Justice </div>-->	
    </div>
</div>
<div id="logo-strip">
	<div id="left-space"> 
    	<i class="fa fa-unlock" style="font-size:12px;color:black; float:left; margin-right: 5px; margin-top: 25px;"></i><h1 style="float:left;">Menu</h1>
    </div>
    <div id="right-space"> 
    	<img src="img/ium-logo.png" height="70px" style="margin-top: 15px;" />
    </div>
</div>

<div class="menu-section menu-section-height-1">
    	<div class="menu-section-strip">Manage
        </div>
        <div  class="menu-section-div-container">
        	<button id="open-bulk-debits" >
            	Semesters
            </button>
            <button id="open-obo" >
            	Timetable
            </button>
            <button id="open-m1p" >
            	Students
            </button>
        </div>
</div>
    
    
     <div class="menu-section menu-section-height-1">
    	<div class="menu-section-strip">Students
        </div>
        <div class="menu-section-div-container">
        	<button id="open-bulk-txt">
            	Front Door
            </button> 
            <button id="open-bulk-txt">
            	Apologies
            </button>
                       
        </div>
    </div>
    
    <div class="menu-section menu-section-height-1">
    	<div class="menu-section-strip">Account
        </div>
        <div class="menu-section-div-container">
        	<button id="open-bulk-txt">
            	Change Staff Number
            </button> 
            <button id="open-bulk-txt">
            	Change Password
            </button>
                       
        </div>
    </div>
<div id="after-login-strip">

</div>

<!-- annual bulk debits -->


<div id="bulk-debits-popup">
<div name="room-types" id="frmroomtypes" >
<div class="form-wrapper" id="frmnewmember-wrapper" style="background-color:#F9F9F9;">
	<!--<div class="forms-color-strip"></div>-->
    <div class="forms-div-caption form-line-end-to-end" style="height: 50px; box-sizing: border-box; margin-bottom: 20px;border-bottom: 0px solid #6C0;padding:10px 50px; color: #fff; background-color: #6C0;">
    	<h2 style="color: #fff;font-weight: normal;">Annual Bulk Debits</h2>
    </div>

    <div class="form-fields-container" style="">
    <form id="frmaddnewmember" >
    	<div id="left-fields">
        <div style="margin-top: 0px;" id="firstname-field-container">
            <label class="form-label" for="FirstName">Click button below to start bulk debits process:</label><br />
            <button style="width: 100px; height: 40px; background-color: red; color: #fff"  name="FirstName" id="FirstName" >Start</button>
        </div>
                
        </div>
    	
         </form> 
        <br style="clear:both" /><div id="bottom-strip" style="margin-bottom:10px;margin-top:10px; border-bottom: 1px solid #6C0;"></div>
        <div id="buttons-field-container">
            <!--<button id="back"><i class="fa fa-arrow-left" style="color:#727272;font-size:10px; margin-right:5px;"></i>Back</button>-->
            <!--<button class="submit">Save<i class="fa fa-check-circle" style="color:#fff; margin-left:10px; opacity: 0.6; font-size:20px;"></i></button>-->
            <button id="close-bulk-debits" style="float: right; border: 1px solid #6C0; background-color: #fff; text-align: center;">Close<i class="fa fa-close" style="color:#6C0; margin-left:10px; opacity: 0.6; font-size:20px;"></i></button>
        </div>
       
    </div>
    <!--<div id="bottom-strip" style="height: 5px; margin-top:0px; background-color: #207bf0; border: 0px;"></div>-->
    
</div>

</div>

</div>

<!-- one - b y - one   -->
<div id="obo-popup">
<h2 style="color: #fff; margin-left: 50px; font-weight: normal;">Manage member D&Cs </h2>
<div name="room-types" id="frmroomtypes">
<div class="form-wrapper obo" id="frmnewmember-wrapper" style="background-color:#E1E1E1; min-height: 400px;">
	    
</div>

</div>

<div class="data-grid-container" style="background-color:#F9F9F9; height: 400px;">
	
    <div class="forms-div-caption form-line-end-to-end" style="height: 30px; box-sizing: border-box; margin:10px 0px 20px 0px;border: 0px solid;padding: 0px;">
    	<label for="SearchText" style="border: 1px solid  #6C0; border-radius: 4px 0px 0px 4px; display:block; float:left; height: 32px; width: 70px; text-align:center; line-height: 32px; background-color:#6C0; color: #fff">Search </label><input id="SearchText-obo" style="width:400px; height: 30px; border: 1px solid #6C0; padding-left: 20px;"/>
    </div>
    <div id="page-content" >
          <div  id="live_data_obo"></div>
    </div>
	<button id="close-obo" style="float: left; border: 1px solid #6C0; background-color: #fff; text-align: center;">Close<i class="fa fa-close" style="color:#6C0; margin-left:	10px; opacity: 0.6; font-size:20px;"></i></button>
	
    
</div>
</div>

<!-- bulk txt -->


<div id="bulk-txt-popup">
<div name="room-types" id="frmroomtypes">
<div class="form-wrapper" id="frmnewmember-wrapper" style="background-color:#F9F9F9;">
	<!--<div class="forms-color-strip"></div>-->
    <div class="forms-div-caption form-line-end-to-end" style="height: 50px; box-sizing: border-box; margin-bottom: 20px;border-bottom: 0px solid #6C0;padding:10px 50px; color: #fff; background-color: #6C0;">
    	<h2 style="color: #fff;font-weight: normal; font-size: 20px;">Send txt to members with outstanding balances</h2>
    </div>

    <div class="form-fields-container" style="">
    <form id="frmaddnewmember" >
    	<div id="left-fields">
        <div style="margin-top: 0px;" id="firstname-field-container">
            <label class="form-label" for="FirstName">Click button below to start the sending of text process:</label><br />
            <button style="width: 100px; height: 40px; background-color: red; color: #fff"  name="FirstName" id="FirstName" >Start</button>
        </div>
                
        </div>
    	
         </form> 
        <br style="clear:both" /><div id="bottom-strip" style="margin-bottom:10px;margin-top:10px; border-bottom: 1px solid #6C0;"></div>
        <div id="buttons-field-container">
            <!--<button id="back"><i class="fa fa-arrow-left" style="color:#727272;font-size:10px; margin-right:5px;"></i>Back</button>-->
            <!--<button class="submit">Save<i class="fa fa-check-circle" style="color:#fff; margin-left:10px; opacity: 0.6; font-size:20px;"></i></button>-->
            <button id="close-bulk-txt" style="float: right; border: 1px solid #6C0; background-color: #fff; text-align: center;">Close<i class="fa fa-close" style="color:#6C0; margin-left:10px; opacity: 0.6; font-size:20px;"></i></button>
        </div>
       
    </div>
    <!--<div id="bottom-strip" style="height: 5px; margin-top:0px; background-color: #207bf0; border: 0px;"></div>-->
    
</div>

</div>

</div>


<!-- member 1 %  -->
<div id="m1p-popup">
<h2 style="color: #fff; margin-left: 50px; font-weight: normal;">Manage member 1% contribution </h2>
<div name="room-types" id="frmroomtypes">
<div class="form-wrapper m1p" id="frmnewmember-wrapper" style="background-color:#E1E1E1; min-height: 400px;">
	    
</div>

</div>

<div class="data-grid-container" style="background-color:#F9F9F9; height: 400px;">
	
    <div class="forms-div-caption form-line-end-to-end" style="height: 30px; box-sizing: border-box; margin:10px 0px 20px 0px;border: 0px solid;padding: 0px;">
    	<label for="SearchText" style="border: 1px solid #6C0; border-radius: 4px 0px 0px 4px; display:block; float:left; height: 32px; width: 70px; text-align:center; line-height: 32px; background-color:#6C0; color: #fff">Search </label><input id="SearchText-m1p" style="width:400px; height: 30px; border: 1px solid #6C0; padding-left: 20px;"/>
    </div>
    <div id="page-content" >
          <div  id="live_data_m1p"></div>
    </div>
	<button id="close-m1p" style="float: left; border: 1px solid #6C0; background-color: #fff; text-align: center;">Close<i class="fa fa-close" style="color:#6C0; margin-left:	10px; opacity: 0.6; font-size:20px;"></i></button>
	
    
</div>
</div>
<!-- overlay background -->

<div id="overlay-bg"></div>
</body>
<style>
.form-fields-container .label-with-data {
	font-family: adelle, 'Times New Roman', Times, serif;
	font-size:30px;
	}
</style>
<script language="javascript" type="text/javascript">
	function IsNumeric(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)){
			alert('That field should have numbers only');
			return false;
			}
		return true;
	}
</script>
</html>