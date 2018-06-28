// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_timetable(searchtext)
				{
					$.ajax({
						url:"timetable/select-timetable.php",
						method:"POST",
						data:{searchtext:searchtext},
						dataType:"text",
						success:function(data){
							$('#timetable-data-grid').html(data);
							}
						});	
				}
				
				
	function buttons_after_insert()
				{
					var timetableresult = $('#timetable-result').val();
					
							if(timetableresult == 'Module timetable data inserted')
								{
									$("#timetable-save-new").hide();
									$("#timetable-add-new").fadeIn();
									$("#timetable-save-edit").hide();
									$("#timetable-clear").hide();
									$("#timetable-refresh").fadeIn();
									$("#timetable-logout").fadeIn();
									$("#timetable-search").fadeIn();
								}
				}
				
	function clear_timetable_inputs()
				{
					var nothing = '';
				
					$('#timetablemod').val(nothing);
					$('#timetabletime').val(nothing);
					$('#timetableday').val(nothing);
				}
				
	$(document).on('click', '#timetable-search', function() {
		
		var searchtext = $('#timetablemod').val();
		
						if(searchtext == '')
							{
								alert("Select Module ");
								 return false;
								}	
						
						fetch_timetable(searchtext);
		
	});
	
	$(document).on('click', '#menu-timetable', function() {
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").fadeIn();
				$("#welcome").hide();
				
				$("#timetable-save-new").fadeIn();
				$("#timetable-add-new").hide();
				$("#timetable-save-edit").hide();
				$("#timetable-clear").fadeIn();
				$("#timetable-refresh").fadeIn();
				$("#timetable-logout").fadeIn();
				$("#timetable-search").fadeIn();
				
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
																  "border-bottom": "0px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-insmod').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-stureg').css({
																  "border-bottom": "0px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-timetable').css({
																  "border-bottom": "2px solid #5299F9",
																});			
				$('#menu-items-container ul #menu-account').css({
																  "border-bottom": "0px solid #5299F9",
																});	
	});
	
	$(document).on('click', '#timetable-add-new', function() {
				
				$("#timetable-save-new").fadeIn();
				$("#timetable-add-new").hide();
				$("#timetable-save-edit").hide();
				$("#timetable-clear").fadeIn();
				$("#timetable-refresh").fadeIn();
				$("#timetable-logout").fadeIn();
						
				clear_timetable_inputs();	
				
	});
	
	$(document).on('click', '#timetable-clear', function() {
		
				clear_timetable_inputs();	
	});
	
	$(document).on('click', '#timetable-save-new', function(){
			var timetablemod = $('#timetablemod').val();
			var timetableday = $('#timetableday').val();
			var timetabletime = $('#timetabletime').val();
			
			if(timetablemod == '')
				{
					alert("Select Module ");
					 return false;
					}	
					
			if(timetableday == '')
				{
					alert("Select Day ");
					 return false;
					}	
					
			if(timetabletime == '')
				{
					alert("Select Time ");
					 return false;
					}
									
				$.ajax({
					url:"timetable/insert-new-timetable.php",
					method:"POST",
					data:{timetablemod:timetablemod, timetableday:timetableday, timetabletime:timetabletime},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_timetable(timetablemod);
							$('#timetable-result').val(data);	
							buttons_after_insert();
						}					
					});	
			});
});