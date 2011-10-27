<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link href="../style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php 
include 'DAO/coachDao.php';

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
	if ($_POST["saveCoach"] != null){
		$coachId = $_POST["id"];
		$coachName = $_POST["name"];
		$coachSSSNo = $_POST["SSSNo"];
		$id = AddCoach($coachName, $coachSSSNo);
		$coachAddress = $_POST["address"];
		$coachTelNo = $_POST["telNo"];
		$coachMobileNo = $_POST["mobileNo"];
		$coachEmail = $_POST["email"];
		if (isset($coachId)){
			EditCoach($coachId, $coachName, $coachSSSNo, $coachAddress, $coachTelNo, $coachMobileNo, $coachEmail);
		} else {
			AddCoachDetails($id, $coachAddress, $coachTelNo, $coachMobileNo, $coachEmail);
		}
		echo 'You have successfully added coach '. $coachName .'!';
		echo '<br />';
		echo 'You have set the coach\'s SSS No as '. $coachSSSNo .'.';
	} else {
		?>
		<?php
		$coachId = $_GET["coachId"];
		if(isset($coachId)){
			$coach = GetCoach($coachId);
			foreach($coach as $c){
				$coachName = $c->name;
				$coachSSSNo = $c->SSSNo;
				$coachAddress = $c->address;
				$coachTelNo = $c->telNo;
				$coachMobileNo = $c->mobileNo;
				$coachEmail = $c->email;
			}
		} else {
				$coachName = null;
				$coachSSSNo = null;
				$coachAddress = null;
				$coachTelNo = null;
				$coachMobileNo = null;
				$coachEmail = null;
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
				}?>
		</ul>
		</div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      
      
	<div class="addCoachForm">
	<form action="addCoach.php" method="post">
		<input type="hidden" name="id" value="<?=$coachId?>"/>
		Coach Name: <input type="text" name="name" value="<?=$coachName?>"/><br>
		SSS No: <input type="text" name="SSSNo" value="<?=$coachSSSNo?>"/><br>
		Address: <input type="text" name="address" value="<?=$coachAddress?>"/><br>
		Telephone No: <input type="text" name="telNo" value="<?=$coachTelNo?>"/><br>
		Mobile No: <input type="text" name="mobileNo" value="<?=$coachMobileNo?>"/><br>
		Email Ad: <input type="text" name="email" value="<?=$coachEmail?>"/><br>
		<div class="btnAdd">
			<input name="saveCoach" type="submit" />
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
