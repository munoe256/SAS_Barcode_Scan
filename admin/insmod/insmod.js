// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_insmod(searchtext)
				{
					
					
					$.ajax({
						url:"insmod/select-insmod.php",
						method:"POST",
						data:{searchtext:searchtext},
						dataType:"text",
						success:function(data){
							$('#insmod-data-grid').html(data);
							}
						});	
				}
				
				
	function buttons_after_insert()
				{
					var insmodresult = $('#insmod-result').val();
					
							if(insmodresult == 'Instructor Module data inserted')
								{
									$("#insmod-save-new").hide();
									$("#insmod-add-new").fadeIn();
									$("#insmod-save-edit").hide();
									$("#insmod-clear").hide();
									$("#insmod-refresh").fadeIn();
									$("#insmod-logout").fadeIn();
									$("#insmod-search").fadeIn();
								}
				}
				
	function clear_insmod_inputs()
				{
					var nothing = '';
				
					$('#insmodmod').val(nothing);
					$('#insmodins').val(nothing);
				}
				
	$(document).on('click', '#insmod-search', function() {
		
		var searchtext = $('#insmodins').val();
		
						if(searchtext == '')
						{
							alert("Select Instructor");
					 		return false;
						}
						
						fetch_insmod(searchtext);
		
	});
	
	$(document).on('click', '#menu-insmod', function() {
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").fadeIn();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				$("#welcome").hide();
				
				$("#insmod-save-new").fadeIn();
				$("#insmod-add-new").hide();
				$("#insmod-save-edit").hide();
				$("#insmod-clear").fadeIn();
				$("#insmod-refresh").fadeIn();
				$("#insmod-logout").fadeIn();
				$("#insmod-search").fadeIn();
				
				
				
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
																  "border-bottom": "2px solid #5299F9",
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
	
	$(document).on('click', '#insmod-add-new', function() {
				
				$("#insmod-save-new").fadeIn();
				$("#insmod-add-new").hide();
				$("#insmod-save-edit").hide();
				$("#insmod-clear").fadeIn();
				$("#insmod-refresh").fadeIn();
				$("#insmod-logout").fadeIn();
						
				clear_insmod_inputs();	
				
	});
	
	$(document).on('click', '#insmod-clear', function() {
		
				clear_insmod_inputs();	
	});
	
	$(document).on('click', '#insmod-save-new', function(){
			var insmodins = $('#insmodins').val();
			var insmodmod = $('#insmodmod').val();
			
			if(insmodins == '')
				{
					alert("Select Instructor ");
					 return false;
					}	
					
			if(insmodmod == '')
				{
					alert("Select Module Name");
					 return false;
					}	
									
				$.ajax({
					url:"insmod/insert-new-insmod.php",
					method:"POST",
					data:{insmodins:insmodins, insmodmod:insmodmod},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_insmod(insmodins);
							$('#insmod-result').val(data);	
							buttons_after_insert();
							
							
						}					
					});	
					
					
					
					
					
					
			});
	
	
	
});