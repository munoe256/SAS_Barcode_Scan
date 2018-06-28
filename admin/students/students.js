// JavaScript Document

$(document).ready(function(){
	
	function fetch_stupro()
				{
					$.ajax({
						url:"students/get-stupro.php",
						method:"POST",
						success:function(data){
							$('#stuprocont').html(data);
							}
						});	
				}
	
	function fetch_students()
				{
					$.ajax({
						url:"students/select-students.php",
						method:"POST",
						success:function(data){
							$('#stu-data-grid').html(data);
							}
						});	
				}
				
	function buttons_after_insert()
				{
					var sturesult = $('#stu-result').val();
					
							if(sturesult == 'Student data inserted')
								{
									$("#stu-save-new").hide();
									$("#stu-add-new").fadeIn();
									$("#stu-save-changes").hide();
									$("#stu-clear").hide();
									$("#stu-refresh").fadeIn();
									$("#stu-logout").fadeIn();
								}
				}
	function clear_student_inputs()
				{
					var nothing = '';
				
					$('#stuno').val(nothing);
					$('#stuname').val(nothing);
					$('#stulname').val(nothing);
					$('#stugender').val(nothing);
					$('#studob').val(nothing);
					$('#stupob').val(nothing);
					$('#stucit').val(nothing);
					$('#stupro').val(nothing);	
					
					$('#stuid').val(nothing);
					$('#stuidt').val(nothing);
					$('#stumo').val(nothing);
					$('#stumno').val(nothing);
					$('#stuphyadd').val(nothing);
					$('#stuposadd').val(nothing);
					$('#stunokname').val(nothing);
					$('#stunokmo').val(nothing);
					$('#stunokmno').val(nothing);
					
				}
	
	$(document).on('click', '#menu-students', function() {

				fetch_students();
				fetch_stupro();
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").fadeIn();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				$("#welcome").hide();
				
				$("#stu-save-new").fadeIn();
				$("#stu-add-new").hide();
				$("#stu-save-changes").hide();
				$("#stu-clear").fadeIn();
				$("#stu-refresh").fadeIn();
				$("#stu-logout").fadeIn();		
				
				$('#menu-items-container ul #menu-students').css({
																  "border-bottom": "2px solid #5299F9",
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
																  "border-bottom": "0px solid #5299F9",
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
	
	
	function sortforedit()
				{
					
				$("#stu-save-new").hide();
				$("#stu-add-new").fadeIn();
				$("#stu-save-changes").fadeIn();
				$("#stu-clear").hide();
				$("#stu-refresh").fadeIn();
				$("#stu-logout").fadeIn();
					
				}
	
	$(document).on('click', '.btn_view_more', function() {			
						
						var id = $(this).data("id4");
	
						$.ajax({
						url:"students/edit-students.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							$('#stu-textboxes').html(data);
							fetch_students();
							sortforedit();
							}
						});
	
	});
	
	$(document).on('click', '#stu-add-new', function() {

				fetch_students();
				
				$("#stu-save-new").fadeIn();
				$("#stu-add-new").hide();
				$("#stu-save-changes").hide();
				$("#stu-clear").fadeIn();
				$("#stu-refresh").fadeIn();
				$("#stu-logout").fadeIn();
				
				$('#stu-textboxes').html('<table><tr><td width="100" class="labels">Module code:</td><td width="300" class="inputs"><input type="text" required name="modcode" id="modcode" /></td></tr><tr><td width="100" class="labels">Module name:</td><td width="300" class="inputs"><input required type="text" name="modname" id="modname"/></td></tr><tr><td width="100" class="labels">Department:</td><td width="300" class="inputs"><select required type="text" name="moddep" id="moddep"><option>BUSINESS INFORMATION SYSTEMS</option><option>AFRICAN LANGUAGES</option><option>ECONOMICS</option></select></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="modnotes" id="modnotes"></textarea></td></tr></table>');
						
				clear_student_inputs();	
				
	});
	
	$(document).on('click', '#stu-clear', function() {
		
				clear_student_inputs();	
	});
	
	$(document).on('click', '#stu-save-new', function(){
		
			var stuno = $('#stuno').val();
			var stuname = $('#stuname').val();
			var stulname = $('#stulname').val();
			var stugender = $('#stugender').val();
			
			var studob = $('#studob').val();
			var stupob = $('#stupob').val();
			var stucit = $('#stucit').val();
			var stupro = $('#stupro').val();
			
			var stuid = $('#stuid').val();
			var stuidt = $('#stuidt').val();
			var stumo = $('#stumo').val();
			var stumno = $('#stumno').val();
			
			var stuphyadd = $('#stuphyadd').val();
			var stuposadd = $('#stuposadd').val();
			var stunokname = $('#stunokname').val();
			var stunokmo = $('#stunokmo').val();
			var stunokmno = $('#stunokmno').val();
			
			if(stuno == '')
				{
					alert("Enter Student #");
					 return false;
					}	
					
			if(stuname == '')
				{
					alert("Enter Student First Name");
					 return false;
					}
					
			if(stulname == '')
				{
					alert("Enter Student Last Name");
					 return false;
					}	
					
			if(stugender == '')
				{
					alert("Select Student Gender");
					 return false;
					}	
					
			if(studob == '')
				{
					alert("Enter Student DOB");
					 return false;
					}
					
			if(stucit == '')
				{
					alert("Enter Student Citizenship");
					 return false;
					}	
			if(stuid == '')
				{
					alert("Enter Student ID");
					 return false;
					}	
					
			if(stuidt == '')
				{
					alert("Select Student ID Type");
					 return false;
					}
					
			if(stumo == '')
				{
					alert("Enter Student Mobile Operator");
					 return false;
					}
			if(stumno == '')
				{
					alert("Enter Student Mobile Number");
					 return false;
					}	
					
			if(stuphyadd == '')
				{
					alert("Enter Student Physical Address");
					 return false;
					}
					
			if(stunokname == '')
				{
					alert("Enter Student Next of Kin Fullname");
					 return false;
					}
			if(stunokmo == '')
				{
					alert("Select Student NOK Mobile Operator");
					 return false;
					}	
					
			if(stunokmno == '')
				{
					alert("Enter Student NOK Mobile Number");
					 return false;
					}
								
									
				$.ajax({
					url:"students/insert-new-stu.php",
					method:"POST",
					data:{stuno:stuno, stuname:stuname, stulname:stulname, stugender:stugender, studob:studob, stupob:stupob, stucit:stucit, stupro:stupro, stuid:stuid, stuidt:stuidt, stumo:stumo, stumno:stumno, stuphyadd:stuphyadd, stuposadd:stuposadd, stunokname:stunokname, stunokmo:stunokmo,stunokmno:stunokmno },
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_students();
							$('#stu-result').val(data);	
							buttons_after_insert();	
						}					
					});	
					
			});
	
	
	
});