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
require_once('AthleteC.php');
class HomePage extends Common
{
	
	function displayHtml()
	{  
      echo 'Bulilit Liga - Athlete Records Management System'; 
		echo '<p><a href="Example1.php">Athlete Records</a></p>';
		echo '<p><a href="Example2.php">Example 2</a></p>';
		echo '<p><a href="Athlete.php">Athlete Records NewTheme</a></p>';
		echo '<p><a href="Users.php">Athlete Join Users NewTheme</a></p>';
                echo '<p><a href="Grades.php">Athlete Join Grades</a></p>';
	}
	
	function HomePage()
	{
		$this->displayHeaderHtml();
		$this->displayHtml();
		$this->displayFooterHtml();
	}
}
$lte = new HomePage();

?>
