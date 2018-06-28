// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_promod(searchtext)
				{
					
					
					$.ajax({
						url:"promod/select-promod.php",
						method:"POST",
						data:{searchtext:searchtext},
						dataType:"text",
						success:function(data){
							$('#promod-data-grid').html(data);
							}
						});	
				}
				
				
	function buttons_after_insert()
				{
					var promodresult = $('#promod-result').val();
					
							if(promodresult == 'Programme Module data inserted')
								{
									$("#promod-save-new").hide();
									$("#promod-add-new").fadeIn();
									$("#promod-save-edit").hide();
									$("#promod-clear").hide();
									$("#promod-refresh").fadeIn();
									$("#promod-logout").fadeIn();
									$("#promod-search").fadeIn();
								}
				}
	function clear_promod_inputs()
				{
					var nothing = '';
				
					$('#promodmod').val(nothing);
					$('#promodpro').val(nothing);
					$('#promodlev').val(nothing);
				}
	$(document).on('click', '#promod-search', function() {
		
		var searchtext = $('#promodpro').val();
		
						if(searchtext == '')
						{
							alert("Select Programme");
					 		return false;
						}
						
						fetch_promod(searchtext);
		
	});
	
	$(document).on('click', '#menu-promod', function() {
				
				var bbottom = '';
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").fadeIn();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				$("#welcome").hide();
				
				$("#promod-save-new").fadeIn();
				$("#promod-add-new").hide();
				$("#promod-save-edit").hide();
				$("#promod-clear").fadeIn();
				$("#promod-refresh").fadeIn();
				$("#promod-logout").fadeIn();
				$("#promod-search").fadeIn();
				
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
																  "border-bottom": "2px solid #5299F9",
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
	
	$(document).on('click', '#promod-add-new', function() {
				
				$("#promod-save-new").fadeIn();
				$("#promod-add-new").hide();
				$("#promod-save-edit").hide();
				$("#promod-clear").fadeIn();
				$("#promod-refresh").fadeIn();
				$("#promod-logout").fadeIn();
						
				clear_promod_inputs();	
				
	});
	
	$(document).on('click', '#promod-clear', function() {
		
				clear_promod_inputs();	
	});
	
	$(document).on('click', '#promod-save-new', function(){
			var promodpro = $('#promodpro').val();
			var promodmod = $('#promodmod').val();
			var promodlev = $('#promodlev').val();
			
			if(promodpro == '')
				{
					alert("Select Programme ");
					 return false;
					}	
					
			if(promodmod == '')
				{
					alert("Select Module Name");
					 return false;
					}
					
			if(promodlev == '')
				{
					alert("Select Level Faculty");
					 return false;
					}	
									
				$.ajax({
					url:"promod/insert-new-promod.php",
					method:"POST",
					data:{promodpro:promodpro, promodmod:promodmod, promodlev:promodlev},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_promod(promodpro);
							$('#promod-result').val(data);	
							buttons_after_insert();
							
							
						}					
					});	
					
					
					
					
					
					
			});
	
	
	
});