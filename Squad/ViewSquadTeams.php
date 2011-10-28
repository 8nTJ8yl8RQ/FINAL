<?php
	//for dbms connection

	require_once "../secure/dbconnect.php";
	include_once "DAO/squadDao.php";
	

	$nav_admin_menu="";  
	//session handling
	require("../User/include/session.php");

	if(!($session->logged_in)){
		Location("header : ../User/main.php");
		exit(1);
	} else {
	
		if($session->isCoach() || $session->isAdmin()) {
			$nav_admin_menu="<a href='PromoteSquadMember.php'>Promote Squad Member</a>";
		} 
	 	else {
		
		//Location("header : ../User/main.php");
		
		}
	}
	
	$con = new MySQL("localhost",MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
	



	try {
		$con->connect();
	} catch (Exception $e ) {
		echo $e->getMessage();
	}


	
	try {
		$con->close();
	} catch (Exception $e ) {
		echo $e->getMessage();
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Squad Members</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
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
          <li ><a href="../User/main.php">Home</a></li>	
          <li ><a href="squadMainPage.php">View Squad Members</a></li>
          <li><?=$nav_admin_menu?></li>
          <li class="active"><a href="ViewSquadTeams.php"> View Squad Teams</a></li>
	  <li ><a href="../User/process.php">Log Out</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
	<p>Under Construction...</p>
      </div>
    </div>
  </div>
  
</div>
</body>
</html>
