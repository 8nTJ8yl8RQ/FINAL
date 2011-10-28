<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link href="../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../scripts/selectbox.js"></script>
	<script type="text/javascript" src="../scripts/jquery/jquery-1.6.4.js"></script>
	<script type="text/javascript" src="../scripts/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript">
		var lastSubCoachId;
		jQuery.noConflict();
		jQuery(document).ready(function(){
    	});

		function filterList(id)
		{
			if (id == 1) {
				if (lastSubCoachId != null){
					jQuery("div[id="+lastSubCoachId+"]").show();
				}
				var hCoachId = jQuery("select[name=coach] :selected").val();
				jQuery("div[id="+hCoachId+"]").hide();
				lastSubCoachId = hCoachId;
			} else if (id == 2) {
				jQuery("input:checkbox:checked").each(function(){
					var checkedId = jQuery(this).val();
					jQuery("select[name=coach] #"+checkedId+"").hide();
					jQuery("select[name=coach] #0").attr("selected",true);
			      });
				
			    jQuery("input:checkbox:not(:checked)").each(function(){
				    var unCheckedId = jQuery(this).val();
				    jQuery("select[name=coach] #"+unCheckedId+"").show();
			      });
			}
		}
    </script>
</head>
<body>
<?php 
require_once('../Squad/Model/squad.php');
require_once('../Coach/Model/coach.php');
require_once('../Coach/DAO/coachDao.php');
require_once('../Squad/DAO/squadDao.php');
require_once('DAO/teamDao.php');
require_once('../User/include/session.php');
require_once("../includes/menu.php");

if (!$session->logged_in){
		header("Location: http://localhost/User/main.php");
	} 
	else if (!$session->isAdmin()){
		if (!$session->isCoach()){
			header("Location: http://localhost/Coach/User/main.php");
//			header("Location: http://localhost/Coach/searchCoach.php");
		}
	}
	else{
		if ($_POST["teamId"] != null && $_POST["teamId"] != "") {
			EditTeam($_POST["teamId"],$_POST["sport"],$_POST["teamName"],$_POST["coach"],$_POST["subCoaches"]);
			echo 'You have successfully edited '. $_POST["teamName"] .' with team id '. $_POST["teamId"] .'!';
			echo '<br />';
		} else if ($_POST["teamName"] != null){
			AddTeam($_POST["sport"], $_POST["teamName"], $_POST["coach"], $_POST["subCoaches"]);
			echo 'You have successfully added '. $_POST["teamName"] .'!';
			echo '<br />';
		} else {
			$teamId = "2";
			
			if (isset($_GET["teamId"])){
				$teamId = $_GET["teamId"];
			} else {
				$teamId = null;
			}
			$teams = GetTeam($teamId);
			foreach($teams as $team){
				$teamName = $team->teamName;
				$sport = $team->sportId;
			}
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
				}


?>
		</ul>
		</div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      
      
	<div class="addTeamForm">
	<form action="addTeam.php" method="post">
		<?php echo '<input type="hidden" name="teamId" value="'.$teamId.'">'; ?>
		Team Name: <input type="text" name="teamName" value="<?=$teamName?>"/><br>
		Sport: <input type="text" name="sport" value="<?=$sport?>"/><br>
		Select a Head Coach:<br />
		<select name="coach" onchange="filterList(1)">
		<?php 
		$coach = GetCoach();
		echo '<option value="0" id="0">Select Here</option>';
		foreach($coach as $c){
			$coachId = $c->id;
			$name = $c->name;
			echo '<option value="'.$coachId.'" id="'.$coachId.'">'.$name.'</option>';
		}
		?>
		</select>
		Please choose the Sub-Coaches:<br />
		<?php 
		$subcoach = GetCoach();
		foreach($subcoach as $sc){
			$coachId = $sc->id;
			$name = $sc->name;
			echo '<div id="'. $coachId .'"><input type="checkbox" id="'.$coachId.'" value="'.$coachId.'" name="subCoaches[]" onclick="filterList(2)">'.$name.'<br /></div>';
		}?>
		
		<div class="btnAdd">
			<input type="submit" />
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
