<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Athletes</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>


<div class="main">
  <div class="header">
    <div class="header_resize">

      <div class="clr"></div>
      <div class="htext">
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html">Home</a></li>
		  <li><a href="athleteView.php">Athlete list</a></li>
          <li><a href="athleteAdd.php">Add athlete</a></li>
          <li><a href="athleteUpdate.php">Update athlete Record</a></li>
          <li class="active"><a href="athleteDelete.php">Delete a record</a></li>
         </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
 
	
<div class="searchTeam">
<?php include 'includes/athleteSearch.php'; ?>

</div>


<?php
include 'Dao/athleteDao.php';
      echo '<center>';

  if(!$_POST["id"])
      {
        
 	echo 'You did not ENTER ID Number to Delete!.';
       
	exit;
      }
   else
      {
	   $id=$_POST["id"];
	   
       athleteDeleteRec($id);
	   
     echo'You have successfully Deleted one Athlete record!.';

     exit;
      }
     echo'</center>';
?>
<!----------->
	<div class="editDelete">

	</div>
	
	</div>
	</div>

</div>
</form>

</body>
</html>
