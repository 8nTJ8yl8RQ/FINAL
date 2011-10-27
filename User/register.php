<?php

include("include/session.php");
require_once("../includes/menu.php");
?>

<html>
<title>Register Page</title>
<body>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cufon-yui.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/arial.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cuf_run.js"></script>
<style type="text/css">
.style1 {
	text-align: left;
	background-color: #DAA520;
}
.style15 {
	border: 2px solid #DAA520;
}
.style26 {
	color: #0000FF;
}
.style27 {
	background-color: #FFFFFF;
}
.style28 {
	text-align: center;
}
.style30 {
	font-size: 13px;
	color: #000000;
	background-color: #FFFFFF;
}
.style32 {
	font-size: 13px;
	font-family: Arial, Helvetica, sans-serif;
	background-color: #FFFFFF;
}
.style33 {
	font-size: 13px;
}
.style34 {
	margin-top: 2px;
}
.style35 {
	font-size: 13px;
	font-family: Arial, Helvetica, sans-serif;
	background-color: #FFFFFF;
	text-align: left;
}
</style>
</head>
<body>

<div class="main">
<div class="header">
<div class="header_resize"><!--      <div class="logo">
        <h1><a href="#">Cream<span>Burn</span> <small>put your slogan here</small></a></h1>
      </div> -->
<div class="clr"></div>
<div class="htext"></div>
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

<hr color="gold" style="width: 973px">

	</div>
		<table style="width: 21%" align="center" class="style15">
			<tr>
				<td class="style1" style="width: 251px">

<?php
if($session->logged_in){
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<a href=\"main.php\">Main</a>.</p>";
}
else if(isset($_SESSION['regsuccess'])){

   if($_SESSION['regsuccess']){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
          ."you may now <a href=\"main.php\">log in</a>.</p>";
   }

   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
else{
?>

<h1 class="style28" style="height: 44px; width: 310px;">Register</h1>

<?php
if($form->num_errors > 0){
   echo "<a href=\"register.php\>";
}
?>
<form action="process.php" method="POST">
<input type="hidden" name="subjoin" value="1">
<table align="left" border="0" cellspacing="0" cellpadding="3" style="width: 309px">
<tr><td class="style30">Username:</td><td class="style32">
	<input type="text" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>" style="width: 188px; height: 31px"></td>
	<td class="style27"><?php echo $form->error("user"); ?></td></tr>
<tr><td class="style30">Password:</td><td class="style32">
	<input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>" style="width: 189px; height: 30px"></td>
	<td class="style27"><? echo $form->error("pass"); ?></td></tr>
<tr><td class="style30">Email:</td><td class="style32">
	<input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>" style="width: 189px; height: 29px"></td>
	<td class="style27"><? echo $form->error("email"); ?></td></tr>
<tr><td colspan="2" class="style35" style="height: 34px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Join!" style="width: 85px; height: 28px">&nbsp;&nbsp;&nbsp;
	<a href="register.php" class="style26">
<input name="Reset" type="reset" value="Reset" style="width: 80px; height: 28px" class="style34"></a></td>
	<td class="style27" style="height: 34px"></td>
</tr>
<tr><td colspan="2" align="left" class="style33">
	<a href="main.php" class="style26">Back to Login</a><span class="style26"> 
	</span></td>
	<td></td>
</tr>
</table>
</form>

<?
}
?>


	<!--	Start Insert-->
	</div>
	</div>

</div>

</body>
</html>
