<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../style.css" />
<script type="text/javascript" src="../scripts/selectbox.js"></script>
<script type="text/javascript" src="../scripts/jquery/jquery-1.6.4.js"></script>
<script type="text/javascript" src="../scripts/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>
</head>
<body>
<?php 
ini_set('display_errors','On');
	
error_reporting(E_ALL);

require_once 'DAO/teamDao.php';

require_once '../User/include/session.php';
require_once '../includes/menu.php';

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
      
<?php 

if (!$session->logged_in){
		header("Location: http://localhost/User/main.php");
	} else if (!$session->isAdmin()){
		if (!$session->isCoach()){
			//redirect to not suppose to be here!
			header("Location: ../User/main.php");
		}
	}
	else {

?>
<div class="searchTeam">
	<form action="searchTeam.php" method="post">
		Team Id: <input type="text" name="teamId" />
		Team Name: <input type="text" name="teamName" />
		Team Coach: <input type="text" name="teamCoach" />
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
	<th><font face="Arial, Helvetica, sans-serif">Sport Type</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Coaches</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Squad Id</font></th>
	</tr>
	<?php
	

		$teamId = $_POST["teamId"];
		$teamName = $_POST["teamName"];
		$teamCoach = $_POST["teamCoach"];	
		$deleteTeams = $_POST["deleteTeamId"];
		$requestType = $_REQUEST["submit"];
		if ($requestType == "Edit") {
			header("Location: addTeam.php?teamId=". $_POST["editTeamId"] .""); /* Redirect browser */
			exit();
		} else if ($requestType == "Add") {
			header("Location: addTeam.php"); /* Redirect browser */
			exit();
			}
		foreach ($deleteTeams as $deleteTeam){
				DeleteTeam($deleteTeam);
			}

		if ($teamId != null){
			$teams = GetTeam($teamId,null,null);
			}
		else if (($teamName == null) && ($teamCoach ==null)){
			$teams = GetTeam();

			}
		else if (($teamName != null) && ($teamCoach !=null)){
			$teams = GetTeam(null,$teamName, $teamCoach);
			}
		else if ($teamCoach != null) {
			$teams = GetTeam(null,null,$teamCoach);
			} 
		else if ($teamName != null) {
			$teams = GetTeam(null,$teamName,null);
			} 
		else {

			$teams = GetTeam();
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
					$coachIds = $team->coachIds;
					$coachIdList = "";
					foreach($coachIds as $coachId){
						$coachIdList .= $coachId->name . "<br />";
					}
					
					$sportList = "";
					$sportArray = $team->sportId;
					$sportList .= $sportArray  . "<br />";
					
					$squadIdList = "";
					$squadIds = $team->squadId;
					foreach($squadIds as $squadId){
						$squadIdList .= $squadId->SquadKind . "<br />";
					}
					?>
						<?php echo '<td class="small"><input type="radio" value="'.$id.'" name="editTeamId">' ?>
						<?php echo '<td class="small"><input type="checkbox" value="'.$id.'" name="deleteTeamId[]">' ?>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $id;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $team->teamName;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$sportList;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$coachIdList;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$squadIdList;?></font></td>
					</tr>
					<?php
					} 
					
					
					?>
	</table>
	<div class="editDelete">
		<input type="submit" name="submit" value="Edit"/>
		<input type="submit" name="submit" value="Delete"/>
		<input type="submit" name="submit" value="Add"/>
	</div>
</form>
<?php }?>
</body>
</html>
