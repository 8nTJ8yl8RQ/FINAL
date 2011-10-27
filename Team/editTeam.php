<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include 'DAO/teamDao.php';
$teamId = $_GET["teamId"];
$team = GetTeam($teamId);
	foreach($team as $t){
		$teamName = $t->teamName;
		$teamGrade = $t->teamGrade;
		$squadId = $t->squadId;
		$coachId = $t->coachId;
		$sport = $t->sport;
	}
    if ("Edit" == $_POST["submit"]){
		$teamId = $_POST["teamId"];
		$teamName = $_POST["teamName"];
		$teamGrade = $_POST["teamGrade"];
		$squadId = $_POST["squadId"];
		$coachId = $_POST["coachId"];
		$sport = $_POST["sport"];
		EditTeam($teamId, $teamName, $teamGrade, $squadId, $coachId, $sport);
		echo "You have successfully edited ".$teamName."!";
		echo '<br>';
		echo "<a href='/searchTeam.php'>back to search</a>";
	} else if ($teamId == null){
		echo "No Team was selected, you're not supposed to be here!";
	} else {
		echo '<div class="editTeamForm">';
		echo '<form action="editTeam.php" method="post">';
		echo '<input type="hidden" name="teamId" value="'. $teamId .'"/>' ;
		echo 'Team Name: <input type="text" name="teamName" value="'. $teamName .'"/>' ;
		echo '<br>';
		echo 'Team Grade: <input type="text" name="teamGrade" value="'. $teamGrade .'"/>' ;
		echo '<br>';
		echo '<br>';
		echo 'Squad ID: <input type="text" name="squadId" value="'. $squadId .'"/>' ;
		echo '<br>';
		echo '<br>';
		echo 'Coach ID: <input type="text" name="coachId" value="'. $coachId .'"/>' ;
		echo '<br>';
		echo '<br>';
		echo 'Sport: <input type="text" name="sport" value="'. $sport .'"/>' ;
		echo '<br>';
			echo '<div class="btnEdit">';
			echo '<input type="submit" name="submit" value ="Edit"/>';
			echo '</div>';
		echo '</div>';
		echo '</form>';
	}
	?>
</body>
</html> 