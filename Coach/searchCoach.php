<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>

<?php 
require_once('DAO/coachDao.php');
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




<div class="searchTeam">
	<form action="searchCoach.php" method="post">
		Coach Id: <input type="text" name="id" />
		Coach Name: <input type="text" name="name" />
		<input text="Search" type="submit" />
	</form>
</div>
<form action="searchCoach.php" method="post">
	<table border="0" cellspacing="2" cellpadding="2" id="teams">
	<tr>
	<th><font face="Arial, Helvetica, sans-serif">Edit</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
	<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Coach Name</font></th>
	<th><font face="Arial, Helvetica, sans-serif">SSS No</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Address</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Tel No</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Mobile No</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Email Ad</font></th>
	</tr>
	<?php
		$coachId = $_POST["id"];
		$coachName = $_POST["name"];
		$userType = $_POST["userType"];
		$deleteCoaches = $_POST["deleteCoachId"];
		$requestType = $_REQUEST["submit"];
		if ($requestType == "Edit") {
			header("Location: http://localhost/coach/addCoach.php?coachId=". $_POST["editCoachId"] .""); /* Redirect browser */
			exit();
		} else if ($requestType == "Add") {
			header("Location: http://localhost/coach/addCoach.php"); /* Redirect browser */
			exit();
			}
		foreach ($deleteCoaches as $deleteCoach){
				DeleteCoach($deleteCoach);
			}
		if ($coachId != null){
			$coaches = GetCoach($coachId,null,null);
			}
		else if (($coachName == null) && ($userType == null)){
			$coaches = GetCoach();
			}
		else if (($coachName != null)  && ($userType != null)) {
			$coaches = GetCoach(null,$coachName,$userType);;
			}
		else if ($coachName != null) {
			$coaches = GetCoach(null,$coachName,null);
			} 
		else {
			$coaches = GetCoach();
			}
				$counter = 0;
				foreach($coaches as $coach){
					$id = $coach->id;
					if ($counter % 2 == 1){
							echo "<tr class='alt'>";
						} else {
							echo "<tr>";
							}
					$counter++;
					?>
						<?php echo '<td class="small"><input type="radio" value="'.$id.'" name="editCoachId">' ?>
						<?php echo '<td class="small"><input type="checkbox" value="'.$id.'" name="deleteCoachId[]">' ?>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $id;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->name;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->SSSNo;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->address;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->telNo;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->mobileNo;?></font></td>
						<td><font face="Arial, Helvetica, sans-serif"><?php echo $coach->email;?></font></td>
					</tr>
					<?php
					} ?>
	</table>
	<div class="editDelete">
		<input type="submit" name="submit" value="Edit"/>
		<input type="submit" name="submit" value="Delete"/>
		<input type="submit" name="submit" value="Add"/>
	</div>
<?php }?>
</form>

<!--	Start Insert-->
	</div>
	</div>

</div>
</body>
</html>
