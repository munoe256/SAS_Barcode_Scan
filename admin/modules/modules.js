// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_modules()
				{
					$.ajax({
						url:"modules/select-modules.php",
						method:"POST",
						success:function(data){
							$('#mod-data-grid').html(data);
							}
						});	
				}
				
	function buttons_after_insert()
				{
					var modresult = $('#mod-result').val();
					
							if(modresult == 'Module data inserted')
								{
									$("#mod-save-new").hide();
									$("#mod-add-new").fadeIn();
									$("#mod-save-changes").hide();
									$("#mod-clear").hide();
									$("#mod-refresh").fadeIn();
									$("#mod-logout").fadeIn();
								}
				}
	function clear_module_inputs()
				{
					var nothing = '';
				
					$('#modcode').val(nothing);
					$('#modname').val(nothing);
					$('#moddep').val(nothing);
					$('#modnotes').val(nothing);	
				}
	
	$(document).on('click', '#menu-modules', function() {

				fetch_modules();
				
				$("#welcome").hide();
				$("#content-area-sem").hide();
				$("#content-area-mod").fadeIn();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				
				$("#mod-save-new").fadeIn();
				$("#mod-add-new").hide();
				$("#mod-save-changes").hide();
				$("#mod-clear").fadeIn();
				$("#mod-refresh").fadeIn();
				$("#mod-logout").fadeIn();
				
				$('#menu-items-container ul #menu-students').css({
																  "border-bottom": "0px solid #5299F9",
																});
				$('#menu-items-container ul #menu-modules').css({
																  "border-bottom": "2px solid #5299F9",
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
																
				$('#mod-textboxes').html('<table><tr><td width="100" class="labels">Module code:</td><td width="300" class="inputs"><input type="text" required name="modcode" id="modcode" /></td></tr><tr><td width="100" class="labels">Module name:</td><td width="300" class="inputs"><input required type="text" name="modname" id="modname"/></td></tr><tr><td width="100" class="labels">Department:</td><td width="300" class="inputs"><select required type="text" name="moddep" id="moddep"><option>BUSINESS INFORMATION SYSTEMS</option><option>AFRICAN LANGUAGES</option><option>ECONOMICS</option></select></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="modnotes" id="modnotes"></textarea></td></tr></table>');
				
	});
	
	function sortforedit()
				{
					
				$("#mod-save-new").hide();
				$("#mod-add-new").fadeIn();
				$("#mod-save-changes").fadeIn();
				$("#mod-clear").hide();
				$("#mod-refresh").fadeIn();
				$("#mod-logout").fadeIn();
					
				}
	
	$(document).on('click', '.btn_view_more', function() {			
						
						var id = $(this).data("id4");
	
						$.ajax({
						url:"modules/edit-modules.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							$('#mod-textboxes').html(data);
							fetch_modules();
							sortforedit();
							}
						});
	
	});
	
	$(document).on('click', '#mod-add-new', function() {

				fetch_modules();
				
				$("#mod-save-new").fadeIn();
				$("#mod-add-new").hide();
				$("#mod-save-changes").hide();
				$("#mod-clear").fadeIn();
				$("#mod-refresh").fadeIn();
				$("#mod-logout").fadeIn();
				
				$('#mod-textboxes').html('<table><tr><td width="100" class="labels">Module code:</td><td width="300" class="inputs"><input type="text" required name="modcode" id="modcode" /></td></tr><tr><td width="100" class="labels">Module name:</td><td width="300" class="inputs"><input required type="text" name="modname" id="modname"/></td></tr><tr><td width="100" class="labels">Department:</td><td width="300" class="inputs"><select required type="text" name="moddep" id="moddep"><option>BUSINESS INFORMATION SYSTEMS</option><option>AFRICAN LANGUAGES</option><option>ECONOMICS</option></select></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="modnotes" id="modnotes"></textarea></td></tr></table>');
					
				clear_module_inputs();	
				
	});
	
	$(document).on('click', '#mod-clear', function() {
		
				clear_module_inputs();	
	});
	
	$(document).on('click', '#mod-save-new', function(){
			var modcode = $('#modcode').val();
			var modname = $('#modname').val();
			var moddep = $('#moddep').val();
			var modnotes = $('#modnotes').val();
			
				
			if(modcode == '')
				{
					alert("Enter Module code");
					 return false;
					}
			if(modname == '')
				{
					alert("Enter Module name");
					 return false;
					}
			if(moddep == '')
				{
					alert("Enter Module department");
					 return false;
					}	
						
								
				$.ajax({
					url:"modules/insert-new-mod.php",
					method:"POST",
					data:{modcode:modcode, modname:modname, moddep:moddep, modnotes:modnotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_modules();
							$('#mod-result').val(data);	
							buttons_after_insert();
						}					
					});		
			});
	
	$(document).on('click', '#mod-save-changes', function(){
		
			var modcode = $('#modcode').val();
			var modname = $('#modname').val();
			var moddep = $('#moddep').val();
			var modnotes = $('#modnotes').val();
			
				
			if(modcode == '')
				{
					alert("Enter Module code");
					 return false;
					}
			if(modname == '')
				{
					alert("Enter Module name");
					 return false;
					}
			if(moddep == '')
				{
					alert("Enter Module department");
					 return false;
					}	
						
								
				$.ajax({
					url:"modules/save-edit-mod.php",
					method:"POST",
					data:{modcode:modcode, modname:modname, moddep:moddep, modnotes:modnotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_modules();
						}					
					});				
			});
	
});