// JavaScript Document

$(document).ready(function(){
	

	
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				
				
	
	function fetch_stureg(searchtext)
				{
					$.ajax({
						url:"stureg/select-stureg.php",
						method:"POST",
						data:{searchtext:searchtext},
						dataType:"text",
						success:function(data){
							$('#stureg-data-grid').html(data);
							}
						});	
				}
				
				
	function buttons_after_insert()
				{
					var sturegresult = $('#stureg-result').val();
					
							if(sturegresult == 'Student registration data inserted')
								{
									$("#stureg-save-new").hide();
									$("#stureg-add-new").fadeIn();
									$("#stureg-save-edit").hide();
									$("#stureg-clear").hide();
									$("#stureg-refresh").fadeIn();
									$("#stureg-logout").fadeIn();
									$("#stureg-search").fadeIn();
								}
				}
				
	function clear_stureg_inputs()
				{
					var nothing = '';
				
					$('#sturegstu1').val(nothing);
					$('#sturegstu2').val(nothing);
				}
				
	$(document).on('click', '#stureg-search', function() {
		var searchtext = '';
		var sturegstu1 = $('#sturegstu1').val();
		var sturegstu2 = $('#sturegstu2').val();
		
						if(sturegstu1 == '' && sturegstu2 == '' )
							{
								alert("Enter Student ");
								 return false;
								}	
								
						if(sturegstu1 == '' && !(sturegstu2 == ''))
							{
								searchtext = sturegstu2;
								}
						if( !(sturegstu1 == ''))
							{
								searchtext = sturegstu1;
								}
						
						fetch_stureg(searchtext);
		
	});
	
	$(document).on('click', '#menu-stureg', function() {
				
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").fadeIn();
				$("#content-area-timetable").hide();
				$("#welcome").hide();
				
				$("#stureg-save-new").fadeIn();
				$("#stureg-add-new").hide();
				$("#stureg-save-edit").hide();
				$("#stureg-clear").fadeIn();
				$("#stureg-refresh").fadeIn();
				$("#stureg-logout").fadeIn();
				$("#stureg-search").fadeIn();
				
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
																  "border-bottom": "2px solid #5299F9",
																});	
				$('#menu-items-container ul #menu-timetable').css({
																  "border-bottom": "0px solid #5299F9",
																});			
				$('#menu-items-container ul #menu-account').css({
																  "border-bottom": "0px solid #5299F9",
																});				
	});
	
	$(document).on('click', '#stureg-add-new', function() {
				
				$("#stureg-save-new").fadeIn();
				$("#stureg-add-new").hide();
				$("#stureg-save-edit").hide();
				$("#stureg-clear").fadeIn();
				$("#stureg-refresh").fadeIn();
				$("#stureg-logout").fadeIn();
						
				clear_stureg_inputs();	
				
	});
	
	$(document).on('click', '#stureg-clear', function() {
		
				clear_stureg_inputs();	
	});
	
	$(document).on('click', '#stureg-save-new', function(){
			var sturegstu = '';
			var sturegstu1 = $('#sturegstu1').val();
			var sturegstu2 = $('#sturegstu2').val();
			
			if(sturegstu1 == '' && sturegstu2 == '' )
				{
					alert("Enter Student ");
					 return false;
					}	
					
			if(sturegstu1 == '' && !(sturegstu2 == ''))
				{
					sturegstu = sturegstu2;
					}
			if( !(sturegstu1 == ''))
				{
					sturegstu = sturegstu1;
					}	
									
				$.ajax({
					url:"stureg/insert-new-stureg.php",
					method:"POST",
					data:{sturegstu:sturegstu},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_stureg(sturegstu);
							$('#stureg-result').val(data);	
							buttons_after_insert();
						}					
					});	
			});
});