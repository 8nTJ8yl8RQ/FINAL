<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Team</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<?php include('includes/includes.php');?>
<div class="main">
  <div class="header">
    <div class="header_resize">
<!--      <div class="logo">
        <h1><a href="#">Cream<span>Burn</span> <small>put your slogan here</small></a></h1>
      </div> -->
      <div class="clr"></div>
      <div class="htext">
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html">Athelete</a></li>
          <li><a href="support.html">Coach</a></li>
          <li><a href="about.html">Squad</a></li>
          <li class="active"><a href="searchTeam.php">Team</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      
	
<div class="searchTeam">
	<form action="searchTeam.php" method="post">
		Team Id: <input type="text" name="teamId" />
		Team Name: <input type="text" name="teamName" />
		Team Grade: <input type="text" name="teamGrade" />
		<input text="Search" type="submit" />
	</form>
</div>
<form action="searchTeam.php" method="post">
	<table border="0" cellspacing="2" cellpadding="2" id="teams">
	<tr>
	<th><font face="Arial, Helvetica, sans-serif">Edit</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
	<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Team Name</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Team Grade</font></th>
	</tr>
	<?php
		$teamId = $_POST["teamId"];
		$teamName = $_POST["teamName"];
		$teamGrade = $_POST["teamGrade"];	
		$deleteTeams = $_POST["deleteTeamId"];
		$requestType = $_REQUEST["submit"];
		if ($requestType == "Edit") {
			header("Location: http://localhost/creamburn/editTeam.php?teamId=". $_POST["editTeamId"] .""); /* Redirect browser */
			exit();
		} else if ($requestType == "Add") {
			header("Location: http://localhost/creamburn/addTeam.php"); /* Redirect browser */
			exit();
			}
		foreach ($deleteTeams as $deleteTeams){
				DeleteTeam($deleteTeam);
			}
			
		if ($teamId != null){
			$teams = GetTeamName($teamId,null,null);
			}
		else if (($teamName == null) && ($teamGrade == null)){
			$teams = GetTeamName();
			}
		else if (($teamName != null)  && ($teamGrade != null)) {
			$teams = GetTeamName(null,$teamName,$teamGrade);;
			}
		else if ($teamName != null) {
			$teams = GetTeamName(null,$teamName,null);
			} 
		else if ($teamGrade != null) {
			$teams = GetTeamName(null,null,$teamGrade);;
			}
		else {
			$teams = GetTeamName();
			}
				$counter = 0;
				foreach($teams as $team){
					$id = $team->id;
					if ($counter % 2 == 1){
							echo "<tr class='alt'>";
						} else {
							echo "<tr>";
							}
					$counter++;
					?>
						<?php echo '<td class="small"><input type="radio" value="'.$id.'" name="editTeamId">' ?>
						<?php echo '<td class="small"><input type="checkbox" value="'.$id.'" name="deleteTeamId[]">' ?>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $id;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $team->teamName;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $team->teamGrade;?></font></td>
					</tr>
					<?php
					} ?>
	</table>
	<div class="editDelete">
		<input type="submit" name="submit" value="Edit"/>
		<input type="submit" name="submit" value="Delete"/>
		<input type="submit" name="submit" value="Add"/>
	</div>
	
	</div>
	</div>

</div>
</form>

</body>
</html>
