// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_programmes()
				{
					$.ajax({
						url:"programmes/select-programmes.php",
						method:"POST",
						success:function(data){
							$('#pro-data-grid').html(data);
							}
						});	
				}
				
	function buttons_after_insert()
				{
					var proresult = $('#pro-result').val();
					
							if(proresult == 'Programme data inserted')
								{
									$("#pro-save-new").hide();
									$("#pro-add-new").fadeIn();
									$("#pro-save-changes").hide();
									$("#pro-clear").hide();
									$("#pro-refresh").fadeIn();
									$("#pro-logout").fadeIn();
								}
				}
	function clear_programme_inputs()
				{
					var nothing = '';
				
					$('#procode').val(nothing);
					$('#proname').val(nothing);
					$('#profac').val(nothing);
					$('#pronotes').val(nothing);	
				}
	
	$(document).on('click', '#menu-programmes', function() {

				fetch_programmes();
				
				$("#welcome").hide();
				$("#content-area-sem").hide();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").fadeIn();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				
				$("#pro-save-new").fadeIn();
				$("#pro-add-new").hide();
				$("#pro-save-changes").hide();
				$("#pro-clear").fadeIn();
				$("#pro-refresh").fadeIn();
				$("#pro-logout").fadeIn();	
				
				$('#menu-items-container ul #menu-students').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-modules').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-programmes').css({
																  "border-bottom": "2px solid #5299F9",
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
																
																
				$('#pro-textboxes').html('<table><tr><td width="100" class="labels">Programme code:</td><td width="300" class="inputs"><input type="text" required name="procode" id="procode" /></td></tr><tr><td width="100" class="labels">Programme name:</td><td width="300" class="inputs"><input type="text" required name="proname" id="proname" /></td></tr><tr><td width="100" class="labels">Faculty:</td><td width="300" class="inputs"><select required type="text" name="profac" id="profac"><option>Science and Technology</option><option>Commerce</option><option>Arts</option></select></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="pronotes" id="pronotes"></textarea></td></tr></table>');		
	});
	
	$(document).on('click', '#pro-add-new', function() {

				fetch_programmes();
				
				$("#pro-save-new").fadeIn();
				$("#pro-add-new").hide();
				$("#pro-save-changes").hide();
				$("#pro-clear").fadeIn();
				$("#pro-refresh").fadeIn();
				$("#pro-logout").fadeIn();
				
				$('#pro-textboxes').html('<table><tr><td width="100" class="labels">Programme code:</td><td width="300" class="inputs"><input type="text" required name="procode" id="procode" /></td></tr><tr><td width="100" class="labels">Programme name:</td><td width="300" class="inputs"><input type="text" required name="proname" id="proname" /></td></tr><tr><td width="100" class="labels">Faculty:</td><td width="300" class="inputs"><select required type="text" name="profac" id="profac"><option>Science and Technology</option><option>Commerce</option><option>Arts</option></select></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="pronotes" id="pronotes"></textarea></td></tr></table>');
						
				clear_programme_inputs();	
				
	});
	
	$(document).on('click', '#pro-clear', function() {
		
				clear_programme_inputs();	
	});
	
	function sortforedit()
				{
					
				$("#pro-save-new").hide();
				$("#pro-add-new").fadeIn();
				$("#pro-save-changes").fadeIn();
				$("#pro-clear").hide();
				$("#pro-refresh").fadeIn();
				$("#pro-logout").fadeIn();
					
				}
	
	$(document).on('click', '.btn_view_more', function() {			
						
						var id = $(this).data("id4");
	
						$.ajax({
						url:"programmes/edit-programmes.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							$('#pro-textboxes').html(data);
							fetch_programmes();
							sortforedit();
							}
						});
	
	});
	
	$(document).on('click', '#pro-save-new', function(){
			var procode = $('#procode').val();
			var proname = $('#proname').val();
			var profac = $('#profac').val();
			var pronotes = $('#pronotes').val();
			
			if(procode == '')
				{
					alert("Enter Programme Code");
					 return false;
					}	
					
			if(proname == '')
				{
					alert("Enter Programme Name");
					 return false;
					}
					
			if(profac == '')
				{
					alert("Select Programme Faculty");
					 return false;
					}	
									
				$.ajax({
					url:"programmes/insert-new-pro.php",
					method:"POST",
					data:{procode:procode, proname:proname, profac:profac, pronotes:pronotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_programmes();
							$('#pro-result').val(data);	
							buttons_after_insert();
							
							
						}					
					});		
			});
	
	$(document).on('click', '#pro-save-changes', function(){
		
			var procode = $('#procode').val();
			var procode = $('#procode').val();
			var proname = $('#proname').val();
			var profac = $('#profac').val();
			var pronotes = $('#pronotes').val();
			
			if(procode == '')
				{
					alert("Enter Programme Code");
					 return false;
					}	
					
			if(proname == '')
				{
					alert("Enter Programme Name");
					 return false;
					}
					
			if(profac == '')
				{
					alert("Select Programme Faculty");
					 return false;
					}	
									
				$.ajax({
					url:"programmes/save-edit-pro.php",
					method:"POST",
					data:{procode:procode, proname:proname, profac:profac, pronotes:pronotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_programmes();
							
						}					
					});				
			});
	
});