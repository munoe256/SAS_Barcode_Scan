// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_instructors()
				{
					$.ajax({
						url:"instructors/select-instructors.php",
						method:"POST",
						success:function(data){
							$('#ins-data-grid').html(data);
							}
						});	
				}
				
	function buttons_after_insert()
				{
					var insresult = $('#ins-result').val();
					
							if(insresult == 'Instructor data inserted')
								{
									$("#ins-save-new").hide();
									$("#ins-add-new").fadeIn();
									$("#ins-save-edit").hide();
									$("#ins-clear").hide();
									$("#ins-refresh").fadeIn();
									$("#ins-logout").fadeIn();
								}
				}
	function clear_instructor_inputs()
				{
					var nothing = '';
				
					$('#insno').val(nothing);
					$('#insname').val(nothing);
					$('#inslname').val(nothing);
					$('#insgender').val(nothing);
					$('#insdob').val(nothing);
					$('#inspob').val(nothing);
					$('#inscit').val(nothing);
					$('#insdep').val(nothing);	
					
					$('#insid').val(nothing);
					$('#insidt').val(nothing);
					$('#insmo').val(nothing);
					$('#insmno').val(nothing);
					$('#insphyadd').val(nothing);
					$('#insposadd').val(nothing);
					$('#insnokname').val(nothing);
					$('#insnokmo').val(nothing);
					$('#insnokmno').val(nothing);
					
				}
	
	$(document).on('click', '#menu-instructors', function() {

				fetch_instructors();
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").fadeIn();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				$("#welcome").hide();
				
				$("#ins-save-new").fadeIn();
				$("#ins-add-new").hide();
				$("#ins-save-edit").hide();
				$("#ins-clear").fadeIn();
				$("#ins-refresh").fadeIn();
				$("#ins-logout").fadeIn();	
				
				$('#menu-items-container ul #menu-students').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-modules').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-programmes').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-semesters').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-promod').css({
																  "border-bottom": "0px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-instructors').css({
																  "border-bottom": "2px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-insmod').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-stureg').css({
																  "border-bottom": "0px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-timetable').css({
																  "border-bottom": "0px solid #5299F9",
																});			
				$('#menu-items-container ul #menu-account').css({
																  "border-bottom": "0px solid #5299F9",
																});			
	});
	
	$(document).on('click', '#ins-add-new', function() {

				fetch_instructors();
				
				$("#ins-save-new").fadeIn();
				$("#ins-add-new").hide();
				$("#ins-save-edit").hide();
				$("#ins-clear").fadeIn();
				$("#ins-refresh").fadeIn();
				$("#ins-logout").fadeIn();
						
				clear_instructor_inputs();	
				
	});
	
	$(document).on('click', '#ins-clear', function() {
		
				clear_instructor_inputs();	
	});
	
	$(document).on('click', '#ins-save-new', function(){
		
			var insno = $('#insno').val();
			var insname = $('#insname').val();
			var inslname = $('#inslname').val();
			var insgender = $('#insgender').val();
			
			var insdob = $('#insdob').val();
			var inspob = $('#inspob').val();
			var inscit = $('#inscit').val();
			var insdep = $('#insdep').val();
			
			var insid = $('#insid').val();
			var insidt = $('#insidt').val();
			var insmo = $('#insmo').val();
			var insmno = $('#insmno').val();
			
			var insphyadd = $('#insphyadd').val();
			var insposadd = $('#insposadd').val();
			var insnokname = $('#insnokname').val();
			var insnokmo = $('#insnokmo').val();
			var insnokmno = $('#insnokmno').val();
			
			if(insno == '')
				{
					alert("Enter Instructor #");
					 return false;
					}	
					
			if(insname == '')
				{
					alert("Enter Instructor First Name");
					 return false;
					}
					
			if(inslname == '')
				{
					alert("Enter Instructor Last Name");
					 return false;
					}	
					
			if(insgender == '')
				{
					alert("Select Instructor Gender");
					 return false;
					}	
					
			if(insdob == '')
				{
					alert("Enter Instructor DOB");
					 return false;
					}
					
			if(inscit == '')
				{
					alert("Enter Instructor Citizenship");
					 return false;
					}	
			if(insid == '')
				{
					alert("Enter Instructor ID");
					 return false;
					}	
					
			if(insidt == '')
				{
					alert("Select Instructor ID Type");
					 return false;
					}
					
			if(insmo == '')
				{
					alert("Enter Instructor Mobile Operator");
					 return false;
					}
			if(insmno == '')
				{
					alert("Enter Instructor Mobile Number");
					 return false;
					}	
					
			if(insphyadd == '')
				{
					alert("Enter Instructor Physical Address");
					 return false;
					}
					
			if(insnokname == '')
				{
					alert("Enter Instructor Next of Kin Fullname");
					 return false;
					}
			if(insnokmo == '')
				{
					alert("Select Instructor NOK Mobile Operator");
					 return false;
					}	
					
			if(insnokmno == '')
				{
					alert("Enter Instructor NOK Mobile Number");
					 return false;
					}
								
									
				$.ajax({
					url:"instructors/insert-new-ins.php",
					method:"POST",
					data:{insno:insno, insname:insname, inslname:inslname, insgender:insgender, insdob:insdob, inspob:inspob, inscit:inscit, insdep:insdep, insid:insid, insidt:insidt, insmo:insmo, insmno:insmno, insphyadd:insphyadd, insposadd:insposadd, insnokname:insnokname, insnokmo:insnokmo, insnokmno:insnokmno },
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_instructors();
							$('#ins-result').val(data);	
							buttons_after_insert();	
						}					
					});	
					
			});
});