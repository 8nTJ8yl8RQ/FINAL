<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include 'DAO/coachDao.php';
$coachId = $_GET["coachId"];
$coaches = GetCoach($coachId);
	foreach($coaches as $c){
		$coachName = $c->name;
		$userType = $c->userType;
	}
    if ("Edit" == $_POST["submit"]){
		$coachId = $_POST["coachId"];
		$coachName = $_POST["name"];
		$userType = $_POST["userType"];
		$squadId = $_POST["squadId"];
		$coachId = $_POST["coachId"];
		$sport = $_POST["sport"];
		EditCoach($coachId, $coachName, $userType);
		echo "You have successfully edited ".$coachName."!";
		echo '<br>';
		echo "<a href='/coach/searchCoach.php'>back to search</a>";
	} else if ($coachId == null){
		echo "No Coach was selected, you're not supposed to be here!";
	} else {
		echo '<div class="editCoachForm">';
		echo '<form action="editCoach.php" method="post">';
		echo '<input type="hidden" name="coachId" value="'. $coachId .'"/>' ;
		echo 'Coach Name: <input type="text" name="name" value="'. $coachName .'"/>' ;
		echo '<br>';
		echo 'User Type: <input type="text" name="userType" value="'. $userType .'"/>' ;
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
