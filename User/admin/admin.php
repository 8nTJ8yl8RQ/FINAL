<?php
include("User/include/session.php");


function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }

   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
if(!$session->isAdmin()){
   header("Location: ../main.php");
}
else{
?>

<html>

<head>
<title>Admin Page</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cufon-yui.js"></script>
<script type="text/javascript" src="../../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/arial.js"></script>
<script type="text/javascript" src="../../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cuf_run.js"></script>
<style type="text/css">
.style1 {
	text-align: right;
}
.style2 {
	font-size: 13px;
}
.style3 {
	border: 2px solid #DAA520;
}
.style6 {
	color: #3A3B3B;
}
.style7 {
	text-align: center;
	color: #000000;
	font-size: 36px;
	background-color: #DAA520;
}
.style8 {
	color: #959595;
}
.style9 {
	border: 2px solid #DAA520;
	color: #3A3B3B;
		font-size: 13px;
}
.style11 {
	color: #323A3F;
}
.style12 {
	border: 2px solid #DAA520;
	color: #3A3B3B;
	font-size: 13px;
	background-color: #DAA520;
	text-align: center;
}
</style>
</head>
<body>

<div class="main">
  <div class="header">
    <div class="header_resize">

      <div class="clr"></div>
      <div class="htext">
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li style="width: 116px"><a href="main.php">Home</a></li>
		  <li style="width: 138px"><a href="aboutUs.php">About Us</a></li>
          <li><a href="contactUs.php">Contact Us</a></li>
                   </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <table style="width: 100%">
		<tr>
			
			<td class="style1">
			<font size="4"><span class="style2">Logged in as<font size="4"><span class="style2">&nbsp;<? echo $session->username; ?></span></font></font></td>
			
		</tr>
		</table>
      <div class="mainbar" style="text-align: center">
 
	
<hr color="gold" style="width: 973px">

	</div>
		<table style="width: 100%; height: 46px">
			<tr>
				<td class="style7" style="height: 54px"><strong>Admin Page</strong></td>
			</tr>
		</table>
		
<?php
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Error with request, please fix</font><br><br>";
}
?>
<table align="center" border="0" cellspacing="5" cellpadding="5">
<tr><td style="width: 377px; height: 60px;" valign="top" class="style3">
<h3 class="style6">System User</h3>
<?php
displayUsers();
?>
</td></tr>
<tr>
<td style="width: 377px">
<br>
</td>
</tr>
<tr>
<td style="width: 488px" class="style3">
<h3 class="style6">Update User Level</h3>
<?php echo $form->error("upduser"); ?>
<table>
<form action="adminprocess.php" method="POST">
<tr><td style="width: 205px">
Username:<br>
<span class="style8">
<input type="text" name="upduser" maxlength="30" value="<?php echo $form->value("upduser"); ?>" style="width: 201px"></span>
</td>
<td style="width: 56px">
Level:<br>
<span class="style8">
<select name="updlevel" style="width: 47px">
<option value="--">--
<option value="1">1
<option value="2">2
<option value="3">3
<option value="9">9
</select></span>
</td>
<td>
<br>
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="Update" style="width: 118px">
</td></tr>
</form>
</table>
</td>
</tr>
<tr>
<td style="width: 488px" class="style3">
<h3 class="style11">Delete User</h3>
<?php echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="deluser" maxlength="30" value="<?php echo $form->value("deluser"); ?>" style="width: 197px">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" value="Delete" style="width: 117px">
</form>
</td>
</tr>
</body>
</html>
<tr>
<td style="width: 377px" class="style12">
<?php
{
echo "<font size=\"2\"> Back To [<a href=\"../main.php\">Main</a>]</font>";
}
?>

</tr>
</table>

<br />
</div>
</body>
</html>

<?php
}
?>
