<?
include("include/session.php");
?>

<html>
<title>User Edit</title>
<body>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cufon-yui.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/arial.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cuf_run.js"></script>
<style type="text/css">
.style1 {
	text-align: center;
	background-color: #DAA520;
}
.style2 {
	font-size: 13px;
	background-color: #FFFFFF;
}
.style3 {
	color: #000000;
}
.style4 {
	font-size: 13px;
	color: #000000;
	background-color: #FFFFFF;
}
.style5 {
	border: 2px solid #DAA520;
}
.style6 {
	background-color: #FFFFFF;
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
          <li style="width: 116px"><a href="index.html">Home</a></li>
		  <li style="width: 138px"><a href="aboutUs.php">About Us</a></li>
          <li><a href="searchTeam.php">Contact Us</a></li>
          </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar" style="text-align: center">
 
	
<div class="searchTeam">

</div>

<hr color="gold" style="width: 973px">

	</div>
		<table style="width: 27%" align="center" class="style5">
			<tr>
				<td class="style1">


<?

if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<h1>User Account Edit Success!</h1>";
   echo "<p><b>$session->username</b>, your account has been successfully updated. "
       ."<a href=\"main.php\">Main</a>.</p>";
}
else{
?>

<?
if($session->logged_in){
?>

<h1 style="width: 331px">Edit User Account</h1>
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="process.php" method="POST">
<input type="hidden" name="subedit" value="1">
<table cellspacing="0" cellpadding="3" style="width: 332px" class="style5">
<tr>
<td class="style4">Current Password:</td>
<td class="style2" style="width: 183px">
<input type="password" name="curpass" maxlength="30" value="
<?echo $form->value("curpass"); ?>" style="width: 179px"></td>
<td class="style6"><? echo $form->error("curpass"); ?></td>
</tr>
<tr>
<td class="style4">New Password:</td>
<td class="style2" style="width: 183px">
<input type="password" name="newpass" maxlength="30" value="
<? echo $form->value("newpass"); ?>" style="width: 177px"></td>
<td class="style6"><? echo $form->error("newpass"); ?></td>
</tr>
<tr>
<td class="style4">Email:</td>
<td class="style2" style="width: 183px">
<input type="text" name="email" maxlength="50" value="
<?
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>" style="width: 171px"><span class="style3"> </span>
</td>
<td class="style6"><? echo $form->error("email"); ?></td>
</tr>
<tr>
<td class="style4">&nbsp;</td>
<td class="style2" style="width: 183px">
<input type="submit" value="Edit Account" style="width: 151px"></td>
<td class="style6">&nbsp;</td>
</tr>
</table>
</form>
<span class="style26"> 
<?
}

echo "<font size=\"2\"> Back To [<a href=\"main.php\">Main</a>]</font>";
}
?>


</body>
</html>
