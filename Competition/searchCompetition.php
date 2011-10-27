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
require_once('DAO/competitionDao.php');
require_once('../Team/DAO/teamDao.php');
require_once('../Team/Model/team.php');
require_once('../User/include/session.php');
require_once("../includes/menu.php");
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
<div class="searchCompetition">
	<form action="searchCompetition.php" method="post">
		Competition Id: <input type="text" name="competitionId" />
		Competition Name: <input type="text" name="competitionName" />
		Competition Coach: <input type="text" name="competitionCoach" />
		<input text="Search" type="submit" />
	</form>
</div>
<form action="searchCompetition.php" method="post">
	<table border="0" cellspacing="2" cellpadding="2" id="teams">
	<tr>
	<th><font face="Arial, Helvetica, sans-serif">Edit</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
	<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Competition Name</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Time</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Venue</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Team</font></th>
	</tr>
	<?php
		$competitionId = $_POST["competitionId"];
		$competitionName = $_POST["competitionName"];
		$competitionCoach = $_POST["competitionCoach"];	
		$deleteCompetitions = $_POST["deleteCompetitionId"];
		$requestType = $_REQUEST["submit"];
		if ($requestType == "Edit") {
			header("Location: http://localhost/competition/makeCompetition.php?competitionId=". $_POST["editCompetitionId"] .""); /* Redirect browser */
			exit();
		} else if ($requestType == "Add") {
			header("Location: http://localhost/competition/makeCompetition.php"); /* Redirect browser */
			exit();
			}
		foreach ($deleteCompetitions as $deleteCompetition){
				DeleteCompetition($deleteCompetition);
			}
		if ($competitionId != null){
			$competitions = GetCompetition($competitionId,null,null);
			}
		else {
			$competitions = GetCompetition();
			}
				$counter = 0;
				foreach($competitions as $competition){
					$id = $competition->id;
					if ($counter % 2 == 1){
							echo "<tr class='alt'>";
						} else {
							echo "<tr>";
							}
					$teamArray = GetTeam($competition->teamId);
					$counter++;
					?>
						<?php echo '<td class="small"><input type="radio" value="'.$id.'" name="editCompetitionId">' ?>
						<?php echo '<td class="small"><input type="checkbox" value="'.$id.'" name="deleteCompetitionId[]">' ?>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $id;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$competition->compName;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$competition->date;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$competition->time;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$competition->venue;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?=$teamArray[0]->teamName;?></font></td>
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
