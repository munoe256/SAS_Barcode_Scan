<?php
session_start();
include('config/setup.php');


$wrongfile = 'no';

if(isset($_POST['btn-upload']))
{    
     
 $file = $_POST['stuno'].'.jpg';
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 
 if($file_type != 'image/jpeg')
 {
	 $wrongfile = 'yes';
	 }
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
// $final_file=str_replace(' ','-',$new_file_name);
 if($wrongfile == 'no')
 { 
	 if(move_uploaded_file($file_loc,$folder.$new_file_name))
	 {
		  $sql="UPDATE students SET file = '$new_file_name' WHERE stuno = '$_POST[stuno]'";
		  mysqli_query($dbc, $sql);
		}
?>
  <script>
  alert('successfully uploaded');
        window.location.href='upload-pic.php';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file. File type must be jpg');
        window.location.href='upload-pic.php?stuno=<?php echo $_POST['stuno'];  ?>';
        </script>
  <?php
 }
}
?>