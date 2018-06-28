// JavaScript Document

$(document).ready(function(){
	
	function fetch_students()
				{
					var lecid = $('#lecid').val();
					
					$.ajax({
							url:"frontdoor/select-students-attend.php",
							method:"POST",
							data:{lecid:lecid},
							dataType:"text",
							success:function(data){
								$('#fd-data-grid').html(data);
								}
							});
				}
	
	$(document).on('click', '#fd-setup', function(){
			var mod = $('#moduleready').val();
			var today = $('#today').val();
			var times = $('#time-s').val();
			var timee = $('#time-e').val();
			
			
			if(mod == '')
				{
					alert("Error: Module not Found");
					 return false;
					}	
					
			if(today == '')
				{
					alert("Error: date not found");
					 return false;
					}
			if(times == '')
				{
					alert("Error: Start time not found");
					 return false;
					}
			if(timee == '')
				{
					alert("Error: End time not found");
					 return false;
					}	
									
				$.ajax({
					url:"frontdoor/setup-lecture.php",
					method:"POST",
					data:{mod:mod, times:times, today:today, timee:timee},
					dataType:"text",
					success:function(data)
						{
							$('#content-area-fd').html(data);	
						}					
					});		
			});
			
			
			$(document).on('keyup', '#stuno', function() {
					
					var stuno = $('#stuno').val();
					var lecid = $('#lecid').val();
					
					//if (stuno == '')
					//{
					//	fetch_students();
					//}
					//else
					//{
						$.ajax({
							url:"frontdoor/register-student.php",
							method:"POST",
							data:{stuno:stuno, lecid:lecid},
							dataType:"text",
							success:function(data){
								$('#success').html(data);
								fetch_students();
								}
							});
					//}
					
				});
				
				
		$(document).on('click', '#menu-fd', function() {	
				
				$('#menu-items-container ul a #menu-fd').css({
																  "border-bottom": "2px solid #5299F9",
																});
				$('#menu-items-container ul #menu-ex').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-att').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-attby').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-account').css({
																  "border-bottom": "0px solid #5299F9",
																});	
					
	});
});