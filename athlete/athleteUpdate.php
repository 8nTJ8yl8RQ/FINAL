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
<style type="text/css">
<!--
.style3 {color: #000000}
.style4 {color: #0000FF}
-->
</style>
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
          <li><a href="../User/main.php">Main</a></li>
		  <li><a href="athleteView.php">Athlete list</a></li>
          <li><a href="athleteAdd.php">Add athlete</a></li>
          <li class="active"><a href="athleteUpdate.php">Update athlete Record</a></li>
          <li><a href="athleteDelete.php">Delete a record</a></li>
	   <li><a href="../User/process.php">Log Out</a></li>
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
<?php include 'includes/primaryTableDisplay.php';?>
<form action="athleteUpdateForm.php" method="post">
	<div class="editDelete">

 
	  <h4><span class="style3">Enter Id Number to <span class="style4">Update:</span></span> 
        <input type="text" name="id" size="8">
        <input type="submit" value="Submit">
	    <input type="reset"> 
      </h4>
  </div>
	</div>

</div>
</form>

</body>
</html>
