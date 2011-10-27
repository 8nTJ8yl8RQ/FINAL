<?
include("include/session.php");
?>

<html>

<head>
<title>Edit User Information</title>
<style type="text/css">
.style5 {
	border: 2px solid #DAA520;
}
.style1 {
	text-align: center;
	background-color: #DAA520;
}
</style>
</head>

<body>


<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cufon-yui.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/arial.js"></script>
<script type="text/javascript" src="../../../../Users/Joanne/Dropbox/BL/FINAL%20COPY!!!%20INSERT%20FINAL%20STUFF%20HERE!!!/Athletefinal/js/cuf_run.js"></script>
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
		<table style="width: 27%" align="left" class="style5">
			<tr>
				<td class="style1">


<?

$req_user = trim($_GET['user']);
if(!$req_user || strlen($req_user) == 0 ||
   !$database->usernameTaken($req_user)){
   die("Username not registered");
}


if(strcmp($session->username,$req_user) == 0){
   echo "<h1>My Account</h1>";
}

else{
   echo "<h1>User Info</h1>";
}

$req_user_info = $database->getUserInfo($req_user);

echo "<b>Username: ".$req_user_info['username']."</b><br>";
echo "<b>Email:</b> ".$req_user_info['email']."<br>";


if(strcmp($session->username,$req_user) == 0){
   echo "<br><a href=\"useredit.php\">Edit Account Information</a><br>";
}

echo "<br>Back To [<a href=\"main.php\">Main</a>]<br>";

?>

</body>
</html>
