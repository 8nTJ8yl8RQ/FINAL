<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../style.css" />
<script type="text/javascript" src="/scripts/selectbox.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery-1.6.4.js"></script>
<script type="text/javascript" src="/scripts/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>

</head>
<body>
<?php 
require_once 'DAO/practiceDao.php';

//require_once '../Team/Model/team.php';
//require_once '../Team/DAO/teamDao.php';
$work_dir_was = getcwd(); 
chdir("../Team");
require_once 'Model/team.php';
require_once 'DAO/teamDao.php';
chdir($work_dir_was); 

require_once '../User/include/session.php';
require_once '../includes/menu.php' ;
if (!$session->logged_in){
		header("Location: http://localhost/User/main.php");
	} else if (!$session->isAdmin()){
		if (!$session->isCoach()){
			//redirect to not suppose to be here!
			header("Location: ../User/main.php");
		}
	}
	else {
ini_set('display_errors', 'On');
?>



<!--Start insert-->
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
			<li class="active"><a href="../User/main.php">Main</a></li>
			<?php 		
			
			if ($session->logged_in){
					if ($session->isAdmin()){
						DisplayAdminMenu();
					} else if ($session->isCoach()) {
						DisplayCoachMenu();
					} else if ($session->isAthelete()){
						DisplayAtheleteMenu();
					} else {
						DisplayGuestMenu();
					}
				}?>
		</ul>
		</div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      
      
<div class="searchPractice">
	<form action="searchPractice.php" method="post">
		Practice Id: <input type="text" name="practiceId" />
		Practice Team: <input type="text" name="teamId" />
		<input text="Search" type="submit" />
	</form>
</div>
<form action="searchPractice.php" method="post">
	<table border="0" cellspacing="2" cellpadding="2" id="teams">
	<tr>
	<th><font face="Arial, Helvetica, sans-serif">Edit</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
	<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Team Name</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Time</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Venue</font></th>
	</tr>
	<?php
		$practiceId = $_POST["practiceId"];
		$practiceTeam = $_POST["teamId"];
		$deletePractices = $_POST["deletePracticeId"];
		$requestType = $_REQUEST["submit"];
		
		if ($requestType == "Edit") {
			header("Location: http://localhost/practice/addPractice.php?practiceId=". $_POST["editPracticeId"] .""); /* Redirect browser */
			exit();
		} else if ($requestType == "Add") {
			header("Location: http://localhost/practice/addPractice.php"); /* Redirect browser */
			exit();
			}
			
		foreach ($deletePractices as $deletePractice){
				DeletePractice($deletePractice);
			}
			
		if ($practiceId != null){
			$practices = GetPractice($practiceId,null,null);
			}
		else if ($practiceTeam != null) {
			$practices = GetPractice(null,$practiceTeam,null);
			} 
		else {
			$practices = GetPractice();
			}
				$counter = 0;
				foreach($practices as $practice){
					$id = $practice->practiceId;
					if ($counter % 2 == 1){
							echo "<tr class='alt'>";
						} else {
							echo "<tr>";
							}
					$counter++;
					$teamId = $practice->teamId;
					$teams = GetTeam($teamId);
					foreach($teams as $team){
						$teamName = $team->teamName;
					}
					$date = $practice->date;
					$time = $practice->time;
					$venue = $practice->venue;
					?>
						<?php echo '<td class="small"><input type="radio" value="'.$id.'" name="editPracticeId">' ?>
						<?php echo '<td class="small"><input type="checkbox" value="'.$id.'" name="deletePracticeId[]">' ?>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $id;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$teamName?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$date;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$time;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$venue;?></font></td>
					</tr>
					<?php
					} ?>
	</table>
	<div class="editDelete">
		<input type="submit" name="submit" value="Edit"/>
		<input type="submit" name="submit" value="Delete"/>
		<input type="submit" name="submit" value="Add"/>
	</div>
</form>
<?php }?>

<!--	Start Insert-->
	</div>
	</div>

</div>


</body>
</html>
