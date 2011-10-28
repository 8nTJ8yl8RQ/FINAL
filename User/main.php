<?php
	require_once("include/session.php");
	require_once("../includes/menu.php");
?>

<html>

<head>
<title>Home</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"
	src="../js/cufon-yui.js"></script>
<script type="text/javascript"
	src="../js/arial.js"></script>
<script type="text/javascript"
	src="../js/cuf_run.js"></script>
<style type="text/css">
.style1 {
	text-align: center;
}

.style4 {
	font-family: Arial, Helvetica, sans-serif;
}

.style5 {
	font-size: small;
}

.style8 {
	font-size: x-small;
}

.style12 {
	color: #FFFFFF;
}

.style13 {
	color: #99CCFF;
}

.style15 {
	border: 2px solid #DAA520;
}

.style7 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	background-color: #FFFFFF;
}

.style30 {
	color: #000000;
	font-size: 13px;
}

.style31 {
	font-size: 13px;
}

.style32 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}

.style33 {
	background-color: #DAA520;
	text-align: center;
}

c
.style34 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-large;
	text-align: center;
}

.style35 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	background-color: #FFFFFF;
}

.style36 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	text-align: center;
	background-color: #FFFFFF;
}

.style37 {
	color: #000000;
}

.style38 {
	color: #0000FF;
}

a {
    color: black;
    text-decoration: underline;
}

a:hover{
    color: white;
    text-decoration: underline;
}
</style>
</head>

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
<table style="width: 100%" align="center">
	<tr>
		<td class="style1">
		<center>
		<table style="width: 326px" class="style15">
			<form action="process.php" method="POST"
				style="height: 37px; width: 303px">
			<tr>
				<td style="width: 424px">

				<table align="left" border="0" cellspacing="0" cellpadding="3"
					style="width: 368px">
					<tr>
						<td class="style33"><?php
						if($session->logged_in){
						echo "<h1>Logged In</h1>";
						echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
						."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
						."[<a href=\"useredit.php\">Edit Account</a>] &nbsp;&nbsp;";
						if($session->isAdmin()){
						echo "[<a href=\"admin/admin.php\">Admin Center</a>] &nbsp;&nbsp";
						}
						if($session->isCoach()){
						echo "[<a href=\"coachView.php\">Coach Center</a>] &nbsp;&nbsp";
						}
						if($session->isAthlete()){
						echo "[<a href=\"athleteView.php\">Athlete/Guardian Center</a>] &nbsp;&nbsp";
						}
						echo "[<a href=\"process.php\">Logout</a>]";
						}
						else{
						?>

						<h1 class="style34" style="height: 44px; width: 369px;">Login</h1>

						<?php
						if($form->num_errors > 0){
						echo "<font size=\"2\" color=\"#ff0000\">Invalid Username/Password!</font>";
						}
						?>

						<form action="process.php" method="POST"
							style="height: 37px; width: 303px">
						<table align="left" border="0" cellspacing="0" cellpadding="3"
							style="width: 368px">
							<tr>
								<td class="style7" style="width: 70px">&nbsp;</td>
								<td class="style35" style="width: 63px">&nbsp;</td>
							</tr>
							<tr>
								<td class="style7" style="width: 70px">Username:</td>
								<td class="style35" style="width: 63px"><input type="text"
									name="user" maxlength="30"
									value="<?php echo $form->value("user"); ?>"
									style="width: 205px; height: 29px;"></td>
							</tr>
							<tr>
								<td class="style7" style="width: 70px">Password:</td>
								<td class="style35" style="width: 63px"><input type="password"
									name="pass" maxlength="30"
									value="<?php echo $form->value("pass"); ?>"
									style="width: 205px; height: 28px;"></td>
							</tr>
							<tr>
								<td colspan="2" class="style36" style="height: 34px"><span
									class="style30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <font
									size="2"><span class="style5"><span class="style8"> <span
									class="style31"> <input type="hidden" name="sublogin" value="1">
								<input type="submit" value="Login"
									style="width: 107px; height: 32px;"></span></span></span></td>
							</tr>
							<tr>
								<td colspan="2" align="left" class="style35"
									style="height: 41px"><span class="style4"> <span class="style5"><span
									class="style8"><span class="style12"> <span class="style13"><span
									class="style31"><input type="checkbox" name="remember"
									<?php if($form->value("remember") != ""){ echo "checked"; } ?>></span></span></span></span></span></span>
								<span class="style4"><span class="style30">Remember me next time</span></span></td>
							</tr>
							<tr>
								<td colspan="2" align="left" class="style32"><span
									class="style37">Not registered? </span> <a href="register.php"
									class="style38">Sign-Up!</a>&nbsp;&nbsp;&nbsp;&nbsp; <font
									size="2">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="forgotpass.php">Forgot Password?</a></font></td>
							</tr>
						</table>
						</form>

						<?php
}
?></td>
					</tr>
				</table>

				</td>
			</tr>
			</form>
</center>


</div>
	</div>

</div>
		</table>
