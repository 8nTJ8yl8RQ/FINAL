<?php
/*
 * Mysql Ajax Table Editor
 *
 * Copyright (c) 2008 Chris Kitchen <info@mysqlajaxtableeditor.com>
 * All rights reserved.
 *
 * See COPYING file for license information.
 *
 * Download the latest version from
 * http://www.mysqlajaxtableeditor.com
 */
class Common
{		
	// Mysql Variables
	var $mysqlUser = 'root';
	var $mysqlDb = 'bulilit2';
	var $mysqlHost = 'localhost';
	var $mysqlDbPass = '';
	
	var $langVars;
	var $dbc;
	
	function mysqlConnect()
	{
		if($this->dbc = mysql_connect($this->mysqlHost, $this->mysqlUser, $this->mysqlDbPass)) 
		{	
			if(!mysql_select_db ($this->mysqlDb))
			{
				$this->logError(sprintf($this->langVars->errNoSelect,$this->mysqlDb),__FILE__, __LINE__);
			}
		}
		else
		{
			$this->logError($this->langVars->errNoConnect,__FILE__, __LINE__);
		}
	}
	
	function logError($message, $file, $line)
	{
		$message = sprintf($this->langVars->errInScript,$file,$line,$message);
		var_dump($message);
		die;
	}


	function displayHeaderHtml()
	{
		?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		<title>Bulilit Athletes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link href="css/table_styles.css" rel="stylesheet" type="text/css" />
			<link href="css/icon_styles.css" rel="stylesheet" type="text/css" />
			<link href="style.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="js/cufon-yui.js"></script>
			<script type="text/javascript" src="js/arial.js"></script>
			<script type="text/javascript" src="js/cuf_run.js"></script>
			<script type="text/javascript" src="js/prototype.js"></script>
			<script type="text/javascript" src="js/scriptaculous-js/scriptaculous.js"></script>
			<script type="text/javascript" src="js/lang/lang_vars-en.js"></script>
			<script type="text/javascript" src="js/ajax_table_editor.js"></script>
			
			<!-- calendar files -->
			<link rel="stylesheet" type="text/css" media="all" href="js/jscalendar/skins/aqua/theme.css" title="win2k-cold-1" /> 
			<script type="text/javascript" src="js/jscalendar/calendar.js"></script>
			<script type="text/javascript" src="js/jscalendar/lang/calendar-en.js"></script>
			<script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script>

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
          <li class="active"><a href="Example3.php">Athlete</a></li>
          <li><a href="support.html">Coach</a></li>
          <li><a href="about.html">Squad</a></li>
          <li><a href="team.php">Team</a></li>
          <li><a href="Example4.php">Users</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
		<?php
	}	
	
	function displayFooterHtml()
	{
		?>
		</body>
		</html>
		<?php
	}	

}
?>
