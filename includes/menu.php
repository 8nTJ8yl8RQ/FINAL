<?php
require_once("../User/include/session.php");

//$athlete = "Athlete";
//$arms = "ARMS";
//$coach = "Coach";
//$squad = "Squad";
//$team = "Team";
//$competition = "Competition";
//$practice = "Practice";
//$logout = "Logout";

function DisplayAdminMenu($inSender=null){
		if($inSender==="Athlete"){
			echo '<li class="active"><a href="../athlete/athleteView.php">Athlete</a></li>';
		} else {
			echo '<li><a href="../athlete/athleteView.php">Athlete</a></li>';
		}
		if($inSender==="ARMS"){
			echo '<li class="active"><a href="../phpMyEdit/index.php">ARMS</a></li>';
		} else {
			echo '<li><a href="../phpMyEdit/index.php">ARMS</a></li>';
		}
	if($inSender==="Coach"){
			echo '<li class="active"><a href="../Coach/searchCoach.php">Coach</a></li>';
		} else {
			echo '<li><a href="../Coach/searchCoach.php">Coach</a></li>';
		}
		
	if($inSender==="Squad"){
			echo '<li class="active"><a href="../Squad/squadMainPage.php">Squad</a></li>';
		} else {
			echo '<li><a href="../Squad/squadMainPage.php">Squad</a></li>';
		}
	if($inSender==="Team"){
			echo '<li class="active"><a href="../Team/searchTeam.php">Team</a></li>';
		} else {
			echo '<li><a href="../Team/searchTeam.php">Team</a></li>';
		}
		
	if($inSender==="Competition"){
			echo '<li class="active"><a href="../Competition/searchCompetition.php">Competitions</a></li>';
		} else {
			echo '<li><a href="../Competition/searchCompetition.php">Competitions</a></li>';
		}
		
	if($inSender==="Practice"){
			echo '<li class="active"><a href="../Practice/searchPractice.php">Practices</a></li>';
		} else {
			echo '<li><a href="../Practice/searchPractice.php">Practices</a></li>';
		}
		
	if($inSender==="Logout"){
			echo '<li class="active"><a href="contact.html">Contact Us</a></li>';
		} else {
			echo '<li><a href="contact.html">Contact Us</a></li>';
		}
			echo '<li><a href="process.php">Log Out</a></li>';		

}

function DisplayAtheleteMenu(){
		if($inSender==="Athlete"){
			echo '<li class="active"><a href="../athlete/athleteView.php">Athlete</a></li>';
		} else {
			echo '<li><a href="../athlete/athleteView.php">Athlete</a></li>';
		}
if($inSender==="Competition"){
			echo '<li class="active"><a href="../Competition/searchCompetition.php">Competitions</a></li>';
		} else {
			echo '<li><a href="../Competition/searchCompetition.php">Competitions</a></li>';
		}
if($inSender==="Practice"){
			echo '<li class="active"><a href="../Practice/searchPractice.php">Practices</a></li>';
		} else {
			echo '<li><a href="../Practice/searchPractice.php">Practices</a></li>';
		}
if($inSender==" "){
		
		} else {
echo '<li><a href="contact.html">Contact Us</a></li>';
		
		}
if($inSender==" "){
		
		} else {
echo '<li><a href="process.php">Log Out</a></li>';
		}
		
return true;
}

function DisplayCoachMenu(){
		echo '<li><a href="../athlete/athleteView.php">Athlete</a></li>';
		echo '<li><a href="../Coach/searchCoach.php">Coach</a></li>';
		echo '<li><a href="../Squad/squadMainPage.php">Squad</a></li>';
		echo '<li><a href="../Team/searchTeam.php">Team</a></li>';
		echo '<li><a href="../Competition/searchCompetition.php">Competitions</a></li>';
		echo '<li><a href="../Practice/searchPractice.php">Practices</a></li>';
		echo '<li><a href="contact.html">Contact Us</a></li>';
		echo '<li><a href="process.php">Log Out</a></li>';
}

function DisplayGuestMenu(){
		echo '<li><a href="contact.html">Contact Us</a></li>';
		echo '<li><a href="process.php">Log Out</a></li>';
}

?>
