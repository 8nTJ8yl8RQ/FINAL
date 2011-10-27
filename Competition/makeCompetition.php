<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
require_once('../Team/Model/team.php');
require_once('../Team/DAO/teamDao.php');
require_once('../athelete/DAO/atheleteDAO.php');
require_once('../athelete/model/athelete.php');
require_once('../Squad/Model/squad.php');
require_once('../Squad/DAO/squadDao.php');
require_once('DAO/competitionDao.php');
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


<link rel="stylesheet" type="text/css" href="../style.css" />
	<script type="text/javascript" src="../scripts/selectbox.js"></script>
	<script type="text/javascript" src="../scripts/jquery/jquery-1.6.4.js"></script>
	<script type="text/javascript" src="../scripts/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="../scripts/jquery/js/addons/jquery.datetimepicker.addon.js"></script>
	<link type="text/css" href="../scripts/jquery/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<script type="text/javascript">
		jQuery.noConflict();
		var teamId;
		jQuery(document).ready(function(){
			if (getQuerystring != ""){
				var selectedValue = getQuerystring("team");
				jQuery("#selectTeam option[value='"+ selectedValue +"']").attr('selected','selected');
				jQuery("input#teamId").val(selectedValue);
			}
			jQuery("#txtDate").datepicker({dateFormat: 'yy-mm-dd'});
			jQuery('input#txtTime').timepicker({
					timeFormat: 'hh:mm:ss',
				});
			addTextBox();
			<?php 
			if (isset($_GET["competitionId"])){
				$competitionId = $_GET["competitionId"];
			}
			if (!isset($competitionId)) {
				$competitionId=null;
				$teamId=null;
				$competitionName = null;
				$competitionDate = null;
				$competitionTime = null;
				$competitionVenue = null;
			} else {
				$competitionArray = GetCompetition($competitionId);
				$competitionId = $competitionArray[0]->id;
				$teamId = $competitionArray[0]->teamId;
				$competitionName = $competitionArray[0]->compName;
				$competitionDate = $competitionArray[0]->date;
				$competitionTime = $competitionArray[0]->time;
				$competitionVenue = $competitionArray[0]->venue;
			}
			?>
    	});

		function getQuerystring(key, default_)
		{
		  if (default_==null) default_="";
		  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		  var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
		  var qs = regex.exec(window.location.href);
		  if(qs == null)
		    return default_;
		  else
		    return qs[1];
		}

		function addTextBox()
		{
					<?php
					if($teamId == null){
						$teamId = 1;
					}
					if(isset($_GET["team"])){
						$teamId = $_GET["team"];
					}
					$atheletes = GetAtheleteViaTeamId($teamId);
					$jsAtheletes = json_encode($atheletes);
					?>
					var jsArray = ['<?=$jsAtheletes?>'];
					var obj = jQuery.parseJSON(jsArray[0]);
					selectString = '';
					selectString+='<br><select name="players[]" id="selectPlayers">';
					iterate(obj, function(){
						selectString+='</select>';
						});
					selectString+='<select name="positions[]" id="selectPosition"><option value="Center" id="1">Center</option><option value="Power Forward" id="2">Power Forward</option><option value="Point Guard" id="3">Point Guard</option><option value="Shooting Guard" id="4">Shooting Guard</option></select>';
					jQuery("#playerList").append(selectString);
					jQuery("#selectTeam option#<?=$teamId?>").attr("selected","selected");
			}

		function iterate(obj) {
			jQuery(obj).each(function(index, value) {
			    selectString+='<option value="'+ value.id +'" id="'+ value.id +'">'+ value.name +'</option>';
			});
		}

		function selectTeam() {
			teamId = jQuery("#selectTeam :selected").val();
			window.location.href = "http://localhost/competition/makeCompetition.php?competitionId=" + getQuerystring("competitionId") + "&teamId=" + teamId;
		}
    </script>
</head>
<body>
<?php 

	if (isset($_POST["Submit"])){
	
		$competitionId;
		
		if (!isset($_GET["competitionId"])) {
			$competitionId=null;
		} else {
			$competitionId=$_GET["competitionId"];
		}
		if ($_POST["competitionId"] != null){
				$teamId = $_POST["team"];
				$compName= $_POST["compName"];
				$date= $_POST["date"];
				$time= $_POST["time"];
				$venue= $_POST["venue"];
				$members = $_POST["players"];
				$positions = $_POST["positions"];
				EditCompetition($teamId,$teamId, $compName, $date, $time, $venue, $members, null, $positions) or die("<p class='error'>Sorry, something went wrong updating the Competition from the database.</p>");
				echo "Congratulations, you have successfully edited a competition!";
		} else {
				$teamId = $_POST["team"];
				$compName= $_POST["compName"];
				$date= $_POST["date"];
				$time= $_POST["time"];
				$venue= $_POST["venue"];
				$members = $_POST["players"];
				$positions = $_POST["positions"];
				AddCompetition($teamId, $compName, $date, $time, $venue, $members, null, $positions);
				echo "Congratulations, you have successfully set a competition!";	
		}
	} else {


	
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


	<form action="makeCompetition.php" method="get">
	<input type="hidden" name="competitionId" type="text" id="competitionId" value="<?=$competitionId?>"/>
	<br />Select a Team:<br />
	<select id="selectTeam" name="team">
	<?php
		$team = GetTeam();
		foreach($team as $s){
			$teamId = $s->id;
			$teamName = $s->teamName;
			echo '<option value="'.$teamId.'">'.$teamName.'</option>';
		}
		?>
	<input type="submit" name="filterTeam"/>
	</select>
	</form>
	List of players in that Team:<input type="button" onClick="addTextBox()" value="add"/>
	<br />
	<form action="makeCompetition.php" method="post">
		<input type="hidden" name="competitionId" type="text" id="competitionId" value="<?=$_GET['competitionId']?>"/>
		<input type="hidden" name="team" type="text" id="teamId" value="<?=$teamId?>"/>
		<div id="playerList">
		</div>
		Competition Name: <input type="text" name="compName" value="<?=$competitionName?>"/><br>
		Date: <input id="txtDate" type="text" name="date" value="<?=$competitionDate?>"/><br>
		Time: <input type="text" name="time" id="txtTime" value="<?=$competitionTime?>"/><br>
		Venue: <input type="text" name="venue" value="<?=$competitionVenue?>"/><br>
		</br>
		<input text="Submit" type="submit" value="Create" name="Submit"/>
	</form>
	<?php }
	}
	
	?>
	
	<!--	Start Insert-->
	</div>
	</div>

</div>
</body>
</html>
