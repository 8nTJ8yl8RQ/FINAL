<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
require_once('DAO/practiceDao.php');
require_once('../Team/Model/team.php');
require_once('../Team/DAO/teamDao.php');
require_once('../athelete/DAO/atheleteDAO.php');
require_once('../athelete/model/athelete.php');
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
<link href="../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../scripts/selectbox.js"></script>
	<script type="text/javascript" src="../scripts/jquery/jquery-1.6.4.js"></script>
	<script type="text/javascript" src="../scripts/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="/scripts/jquery/js/addons/jquery.datetimepicker.addon.js"></script>
	<link type="text/css" href="../scripts/jquery/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<script type="text/javascript">
		var selectString;
		jQuery.noConflict();
		jQuery(document).ready(function(){
			if (getQuerystring != ""){
				var selectedValue = getQuerystring("practiceId");
				jQuery("input#id").val(selectedValue);
			}
			jQuery("#txtDate").datepicker({dateFormat: 'yy-mm-dd'});
			jQuery('input#txtTime').timepicker({
					timeFormat: 'hh:mm:ss',
				});
			addTextBox();
			<?php 
			if (isset($_GET["practiceId"])){
			$practiceId = $_GET["practiceId"];
			}
		
			if(isset($practiceId)){
				$practice = GetPractice($practiceId);
				foreach($practice as $p){
					$practiceTeam = $p->teamId;
					$practiceDate = $p->date;
					$practiceTime= $p->time;
					$practiceVenue= $p->venue;
				}
			} else {
				$practiceId = null;
				$practiceTeam = 0;
				$practiceDate = null;
				$practiceTime = null;
				$practiceVenue = null;
			}
					?>
					jQuery("#selectTeam option#<?=$practiceTeam?>").attr("selected","selected");
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
			$atheletes = GetAthelete();
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
			}
		function iterate(obj) {
			jQuery(obj).each(function(index, value) {
			    selectString+='<option value="'+ value.id +'" id="'+ value.id +'">'+ value.name +'</option>';
			});
		}
	</script>
</head>
<body>
<?php 


if (isset($_POST["savePractice"])){
	$practiceId = $_POST["id"];
	$practiceTeam = $_POST["team"];
	$practiceDate = $_POST["date"];
	$practiceTime = $_POST["time"];
	$practiceVenue = $_POST["venue"];
	$positions = $_POST["positions"];
	$players = $_POST["players"];
	
	if ($practiceId != null){
		EditPractice($practiceId, $practiceTeam, $practiceDate, $practiceTime, $practiceVenue, $players, $positions, null) or die ("<p class='error'>Sorry, we were unable to edit your practice details to the database.</p>"); 
	} else {
		echo "<br />";
		AddPractice($practiceTeam, $practiceDate, $practiceTime, $practiceVenue, $players, $positions, null);
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
      
      
	<div class="addPracticeForm">
	<form action="addPractice.php" method="post">
		<input type="hidden" name="id" value="<?=$practiceId?>"/>
		Select Team:
		<select name="team" id="selectTeam">
		<?php
		//Set team ID
		$team = GetTeam();
		echo '<option value="0" id="0">Select Here</option>';
		foreach($team as $t){
			$teamId = $t->id;
			$teamName = $t->teamName;
			echo '<option value="'.$teamId.'" id="'.$teamId.'">'.$teamName.'</option>';
		}
		?>
		
		</select>
		<br />
		<div id="playerList">
		<input type="button" onClick="addTextBox()" value="add"/>
		</div>
		Date: <input type="text" name="date" id="txtDate" value="<?=$practiceDate?>"/><br>
		Time: <input type="text" name="time" id="txtTime" value="<?=$practiceTime?>"/><br>
		Venue: <input type="text" name="venue" value="<?=$practiceVenue?>"/><br>
		<div class="btnAdd">
			<input name="savePractice" type="submit" />
		</div>
	</form>
	</div>
	<?php
	}
	}
?>

<!--	Start Insert-->
	</div>
	</div>

</div>
</body>
</html> 
