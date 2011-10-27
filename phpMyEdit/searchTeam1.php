<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Team</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
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
          <li><a href="index.html">Athelete</a></li>
          <li><a href="support.html">Coach</a></li>
          <li><a href="about.html">Squad</a></li>
          <li class="active"><a href="searchTeam1.php">Team</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
  </div>
      
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
require_once('Common.php');
require_once('php/lang/LangVars-en.php');
require_once('php/AjaxTableEditor.php');
class Example1 extends Common
{
	var $Editor;
	
	function displayHtml()
	{
		?>
			<br />
	
			<div align="left" style="position: relative;"><div id="ajaxLoader1"><img src="images/ajax_loader.gif" alt="Loading..." /></div></div>
			
			<br />
			
			<div id="historyButtonsLayer" align="left">
			</div>
	
			<div id="historyContainer">
				<div id="information">
				</div>
		
				<div id="titleLayer" style="padding: 2px; font-weight: bold; font-size: 18px; text-align: center;">
				</div>
		
				<div id="tableLayer" align="center">
				</div>
				
				<div id="recordLayer" align="center">
				</div>		
				
				<div id="searchButtonsLayer" align="center">
				</div>
			</div>
			
			<script type="text/javascript">
				trackHistory = false;
				var ajaxUrl = '<?php echo $_SERVER['PHP_SELF']; ?>';
				toAjaxTableEditor('update_html','');
			</script>
		<?php
	}

	function initiateEditor()
	{
		$tableColumns['id'] = array('display_text' => 'ID', 'perms' => 'TVQSXO');
		$tableColumns['ath_firstName'] = array('display_text' => 'First Name', 'perms' => 'EVCTAXQSHO');
		$tableColumns['ath_lastName'] = array('display_text' => 'Last Name', 'perms' => 'EVCTAXQSHO');
		$tableColumns['ath_sport'] = array('display_text' => 'Sport', 'perms' => 'EVCTAXQSHO');
		$tableColumns['ath_squad'] = array('display_text' => 'Squad', 'perms' => 'EVCTAXQSHO', 'select_array' => array('Competing Squad' => 'Competing Squad', 'Training Squad' => 'Training Squad')); 
		$tableColumns['ath_birthDate'] = array('display_text' => 'Birthday', 'perms' => 'EVCTAXQSHO', 'display_mask' => 'date_format(ath_birthDate,"%d %M %Y")', 'calendar' => '%d %B %Y','col_header_info' => 'style="width: 250px;"'); 
		
		$tableName = 'athlete2';
		$primaryCol = 'id';
		$errorFun = array(&$this,'logError');
		$permissions = 'EAVIDQCSX';
		
		$this->Editor = new AjaxTableEditor($tableName,$primaryCol,$errorFun,$permissions,$tableColumns);
		$this->Editor->setConfig('tableInfo','cellpadding="1" width="880" class="mateTable"');
		$this->Editor->setConfig('orderByColumn','ath_firstName');
		$this->Editor->setConfig('addRowTitle','Add Athlete');
		$this->Editor->setConfig('editRowTitle','Edit Athlete');
		//$this->Editor->setConfig('iconTitle','Edit Employee');
	}
	
	
	//function Example1()
	//{
	//	if(isset($_POST['json']))
	//	{
	//		session_start();
			// Initiating lang vars here is only necessary for the logError, and mysqlConnect functions in Common.php. 
			// If you are not using Common.php or you are using your own functions you can remove the following line of code.
		//	$this->langVars = new LangVars();
		//	$this->mysqlConnect();
		//	if(ini_get('magic_quotes_gpc'))
		//	{
		//		$_POST['json'] = stripslashes($_POST['json']);
		//	}
		//	if(function_exists('json_decode'))
		//	{
		//		$data = json_decode($_POST['json']);
		//	}
		//	else
		//	{
		//		require_once('php/JSON.php');
		//		$js = new Services_JSON();
		//		$data = $js->decode($_POST['json']);
		//	}
		//	if(empty($data->info) && strlen(trim($data->info)) == 0)
		//	{
		//		$data->info = '';
		//	}
		//	$this->initiateEditor();
		//	$this->Editor->main($data->action,$data->info);
		//	if(function_exists('json_encode'))
		//	{
		//		echo json_encode($this->Editor->retArr);
		//	}
		//	else
		//	{
		//		echo $js->encode($this->Editor->retArr);
		//	}
		//}
		//else if(isset($_GET['export']))
		//{
      //      session_start();
       //     ob_start();
       //     $this->mysqlConnect();
        //    $this->initiateEditor();
        //    echo $this->Editor->exportInfo();
         //   header("Cache-Control: no-cache, must-revalidate");
         //   header("Pragma: no-cache");
         //   header("Content-type: application/x-msexcel");
         //   header('Content-Type: text/csv');
         //   header('Content-Disposition: attachment; filename="'.$this->Editor->tableName.'.csv"');
         //   exit();
       // }
		//else
		//{
		//	$this->displayHeaderHtml();
		//	$this->displayHtml();
		//	$this->displayFooterHtml();
		//}
	//}
}
$lte = new Example1();
?>

</body>
</html>
