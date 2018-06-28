// JavaScript Document

$(document).ready(function(){
	
	
	function fetch_semesters()
				{
					$.ajax({
						url:"semesters/select-semesters.php",
						method:"POST",
						success:function(data){
							$('#sem-data-grid').html(data);
							}
						});	
				}
				
	function buttons_after_insert()
				{
					var semresult = $('#sem-result').val();
					
							if(semresult == 'Semester data inserted')
								{
									$("#sem-save-new").hide();
									$("#sem-add-new").fadeIn();
									$("#save-sem-changes").hide();
									$("#sem-clear").hide();
									$("#sem-refresh").fadeIn();
									$("#sem-logout").fadeIn();
								}
				}
	function clear_semester_inputs()
				{
					var nothing = '';
				
					$('#semcode').val(nothing);
					$('#semsdate').val(nothing);
					$('#semedate').val(nothing);
					$('#semnotes').val(nothing);	
				}
				
	$(document).on('click', '.btn_close', function() {			
						
						var id = $(this).data("id7");
	
						$.ajax({
						url:"semesters/close-semesters.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							alert(data);
							fetch_semesters();
							}
						});
	
	});
	
	$(document).on('click', '.btn-open', function() {			
						
						var id = $(this).data("id8");
	
						$.ajax({
						url:"semesters/open-semesters.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							alert(data);
							fetch_semesters();
							}
						});
	
	});
	
	$(document).on('click', '.btn_view_more', function() {			
						
						var id = $(this).data("id4");
	
						$.ajax({
						url:"semesters/edit-semesters.php",
						method:"POST",
						data:{id:id},
						dataType:"text",
						success:function(data){
							$('#sem-textboxes').html(data);
							fetch_semesters();
							sortforedit();
							}
						});
	
	});
	
	function sortforedit()
				{
					
				$("#sem-save-new").hide();
				$("#sem-add-new").fadeIn();
				$("#save-sem-changes").fadeIn();
				$("#sem-clear").hide();
				$("#sem-refresh").fadeIn();
				$("#sem-logout").fadeIn();
					
				}
	
	$(document).on('click', '.menu-semesters', function() {

				fetch_semesters();
				
				$("#welcome").hide();
				$("#content-area-sem").fadeIn();
				$("#content-area-mod").hide();
				$("#content-area-stu").hide();
				$("#content-area-ins").hide();
				$("#content-area-pro").hide();
				$("#content-area-promod").hide();
				$("#content-area-insmod").hide();
				$("#content-area-stureg").hide();
				$("#content-area-timetable").hide();
				
				$("#sem-save-new").fadeIn();
				$("#sem-add-new").hide();
				$("#save-sem-changes").hide();
				$("#sem-clear").fadeIn();
				$("#sem-refresh").fadeIn();
				$("#sem-logout").fadeIn();
				
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
																  "border-bottom": "2px solid #5299F9",
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
																
				$('#sem-textboxes').html('<table><tr><td width="100" class="labels">Semester #:</td><td width="300" id="new-sem-no-input" class="inputs"><input type="number" contentnoteditable required name="semno" id="semno" /></td></tr><tr><td width="100" class="labels">Semester code:</td><td width="300" class="inputs"><input type="text" required name="semcode" id="semcode" /></td></tr><tr><td width="100" class="labels">Start date:</td><td width="300" class="inputs"><input  min="2016-01-01" max="2017-12-31" required type="date" name="semsdate" id="semsdate"/></td></tr><tr><td width="100" class="labels">End date:</td><td width="300" class="inputs"><input min="2016-01-01" max="2017-12-31" required type="date" name="semedate" id="semedate" /></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="semnotes" id="semnotes"></textarea></td></tr></table>');
				
		function fetch_new_sem_no()
				{
					$.ajax({
						url:"semesters/search-new-sem-no.php",
						method:"POST",
						success:function(data){
							$('#new-sem-no-input').html(data);
							}
						});
						
						
				}
				
				fetch_new_sem_no();		
				
	});
	
	$(document).on('click', '#sem-add-new', function() {

				fetch_semesters();
				
				$("#sem-save-new").fadeIn();
				$("#sem-add-new").hide();
				$("#save-sem-changes").hide();
				$("#sem-clear").fadeIn();
				$("#sem-refresh").fadeIn();
				$("#sem-logout").fadeIn();
				
				$('#sem-textboxes').html('<table><tr><td width="100" class="labels">Semester #:</td><td width="300" id="new-sem-no-input" class="inputs"><input type="number" contentnoteditable required name="semno" id="semno" /></td></tr><tr><td width="100" class="labels">Semester code:</td><td width="300" class="inputs"><input type="text" required name="semcode" id="semcode" /></td></tr><tr><td width="100" class="labels">Start date:</td><td width="300" class="inputs"><input  min="2016-01-01" max="2017-12-31" required type="date" name="semsdate" id="semsdate"/></td></tr><tr><td width="100" class="labels">End date:</td><td width="300" class="inputs"><input min="2016-01-01" max="2017-12-31" required type="date" name="semedate" id="semedate" /></td></tr><tr><td width="100" class="labels">Notes:</td><td width="300" class="inputs"><textarea type="text" name="semnotes" id="semnotes"></textarea></td></tr></table>');
				
		function fetch_new_sem_no()
				{
					$.ajax({
						url:"semesters/search-new-sem-no.php",
						method:"POST",
						success:function(data){
							$('#new-sem-no-input').html(data);
							}
						});
						
						
				}
				
				fetch_new_sem_no();	
				
				clear_semester_inputs();	
				
	});
	
	$(document).on('click', '#sem-clear', function() {
		
				clear_semester_inputs();	
	});
	
	$(document).on('click', '#sem-save-new', function(){
			var semno = $('#semno').val();
			var semcode = $('#semcode').val();
			var semsdate = $('#semsdate').val();
			var semedate = $('#semedate').val();
			var semnotes = $('#semnotes').val();
			
			
			if(semno == '')
				{
					alert("Enter Semester #");
					 return false;
					}	
					
			if(semcode == '')
				{
					alert("Enter Semester code");
					 return false;
					}
			if(semsdate == '')
				{
					alert("Enter Start date");
					 return false;
					}
			if(semedate == '')
				{
					alert("Enter End date");
					 return false;
					}	
						
								
				$.ajax({
					url:"semesters/insert-new-sem.php",
					method:"POST",
					data:{semno:semno, semcode:semcode, semsdate:semsdate, semedate:semedate, semnotes:semnotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_semesters();
							$('#sem-result').val(data);	
							buttons_after_insert();
							
							
						}					
					});	
					
					
					
					
					
					
			});
	
	$(document).on('click', '#save-sem-changes', function(){
			var semno = $('#semno').val();
			var semcode = $('#semcode').val();
			var semsdate = $('#semsdate').val();
			var semedate = $('#semedate').val();
			var semnotes = $('#semnotes').val();
			
			
			if(semno == '')
				{
					alert("Enter Semester #");
					 return false;
					}	
					
			if(semcode == '')
				{
					alert("Enter Semester code");
					 return false;
					}
			if(semsdate == '')
				{
					alert("Enter Start date");
					 return false;
					}
			if(semedate == '')
				{
					alert("Enter End date");
					 return false;
					}	
						
								
				$.ajax({
					url:"semesters/save-edit-sem.php",
					method:"POST",
					data:{semno:semno, semcode:semcode, semsdate:semsdate, semedate:semedate, semnotes:semnotes},
					dataType:"text",
					success:function(data)
						{
							alert(data);
							fetch_semesters();
							
						}					
					});	
					
					
					
					
					
					
			});
	
});