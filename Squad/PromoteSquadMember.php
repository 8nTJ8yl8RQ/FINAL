<?php
	ini_set('display_errors','On');
	error_reporting(E_ALL);

	//for dbms connection

	require_once "../secure/dbconnect.php";
	include_once "DAO/squadDao.php";
	
 	
	$nav_admin_menu="";  
	//session handling
	require_once "../User/include/session.php";
	if(!($session->logged_in)){
		Location("header : ../User/main.php");
		exit();
	} else {
	
		if($session->isCoach() || $session->isAdmin()) {
			$nav_admin_menu="<a href='PromoteSquadMember.php'>Promote Squad Member</a>";
		} 
	 	else {
		
		Location("header : ../User/main.php");
		
		}
	}
	
	//states : View, Start Promotion, Checking Done
	//transitions: view-> edit, edit ->update, update->views,  or *->view * (default)
	$form_opt_menu_open  ="";
	$form_opt_menu_close ="";

 	//Connect to database and make connection
	$con = new MySQL("localhost",MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
	
	try {
		$con->connect();
	} catch (Exception $e ) {
		echo $e->getMessage();
	}
	
	$sqd = new SquadDao($con);
	
	$result_array = $sqd->getAllCandidateForPromotion();

	//initialize parameter for content generations
	$table_head = "";
	$table = "";
	$i = 0;
	$c = count($result_array);
	$page_state="";
	$candidates=array();
	      
	
	//view => edit
//	if(isset($_POST['submit'])){
//		print "<p>Post Captured value: $_POST['submit']</p>";
//	}


	$form_opt_menu_open ="<form action='PromoteSquadMember.php' method= 'post'>";

// view controller start

//var_dump($_POST['submit']);
//var_dump($_POST['promote_candidate']);

	//initialization	

	if(!$page_state) {
	 	$page_state = 'View';//default state
	}	
	
	if( isset($_POST['submit'])) {//trigger
	   //retrive state from post
		$page_state = $_POST['submit'];	
		
//		var_dump($page_state);	
		
		//get other inputs base on state
		if ($page_state === 'Checking Done') {
			if( isset($_POST['promote_candidate']) ) {
				$candidates = $_POST['promote_candidate'];
			}
		}
	} 
///end of view controller
	
		//base on state generate forms
		if ( ($page_state === 'Checking Done')|| $page_state === 'View') {
	//		if($session->isCoach() || $session->isAdmin()) {
				$form_opt_menu_close ="<input type='submit' name='submit' value='Start Promotion'>
 	               		         </form>";
	//		} else {//athlete
	//			$form_opt_menu_close ="";
	//		}
		
		}else	{//$page_state = 'Start Promotion'; 
		
	//		if($session->isCoach() || $session->isAdmin()) {
			$form_opt_menu_close =" <input type='submit' name='submit' value='Checking Done'>
                		         </form>";
	//		} else {//athlete
	//			$form_opt_menu ="";	
		}

	

	
 	   //process base on state and inputs generate content
		if($page_state ==='Start Promotion' ) {
			$table_head="<th><font face='Arial, Helvetica, sans-serif'>Check One to Promote</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Name</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Team</font></th>
         		     	     <th><font face='Arial, Helvetica, sans-serif'>Sport</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Position</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Primary Position</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Grade</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Gender</font></th>
			     	     <th><font face='Arial, Helvetica, sans-serif'>Status</font></th>
			     ";
			//$promote_candidate=array();
			while (!empty($result_array) && ( $i < $c )) {
				$nm   = $result_array[$i]->name;
				$tm   = $result_array[$i]->team; 
				$spr  = $result_array[$i]->sport;
				$pos  = $result_array[$i]->position;
				$ispri= $result_array[$i]->isPrimePos;
				$gr   = $result_array[$i]->grade;
				$st   = $result_array[$i]->status;
				$gen  = $result_array[$i]->gender;
				$memID= $result_array[$i]->memId;
				if ($i % 2 == 1){
					$table .= "<tr class='alt'>
						<td class='small'>
						<input type='checkbox' value='$memID' name='promote_candidate[]'></td>
						<td>$nm</td>
						<td>$tm</td>
						<td>$spr</td>
						<td>$pos</td>
						<td>$ispri</td>
						<td>$gr</td>
						<td>$gen</td>
						<td>$st</td>
					</tr>";
				} else {
					$table .= "<tr>
						<td class='small'><input type='checkbox' value='$memID' name='promote_candidate[]'></td>
						<td>$nm</td>
						<td>$tm</td>
						<td>$spr</td>
						<td>$pos</td>
						<td>$ispri</td>
						<td>$gr</td>
						<td>$gen</td>
						<td>$st</td>
					</tr>";
				}

				$i+=1;
			}

			if(empty($table)) {
				$table .= "<tr>
						<td>No Entries!</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>";
			}	
	
		} else{//view  
			if($page_state ==='Checking Done'){
				//var_dump($candidates);
				if(count($candidates)>0){
					$sqd->promoteSquadMems($candidates,2);//$position = 2 or competing squad
     			}
				//update result array after promotion
				//for display
				//promoted Members will be removed from the list
				$result_array = $sqd->getAllCandidateForPromotion();
			}
		
			$table_head="<th><font face='Arial, Helvetica, sans-serif'>Name</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Team</font></th>
         		     	     <th><font face='Arial, Helvetica, sans-serif'>Sport</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Position</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Primary Position</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Grade</font></th>
				     <th><font face='Arial, Helvetica, sans-serif'>Gender</font></th>
			     	     <th><font face='Arial, Helvetica, sans-serif'>Status</font></th>";

			while (!empty($result_array) && ( $i < $c )) {
				$nm   = $result_array[$i]->name;
				$tm   = $result_array[$i]->team; 
				$spr  = $result_array[$i]->sport;
				$pos  = $result_array[$i]->position;
				$ispri= $result_array[$i]->isPrimePos;
				$gr   = $result_array[$i]->grade;
				$gen   = $result_array[$i]->gender;	
				$st  = $result_array[$i]->status;

				if ($i % 2 == 1){
					$table .= "<tr class='alt'>
							<td><font face='Arial, Helvetica, sans-serif'>$nm </font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$tm</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$spr</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$pos</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$ispri</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$gr </font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$gen</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$st </font></td>
						</tr>";
				} else {
					$table .= "<tr>
							<td><font face='Arial, Helvetica, sans-serif'>$nm </font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$tm</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$spr</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$pos</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$ispri</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$gr </font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$gen</font></td>
							<td><font face='Arial, Helvetica, sans-serif'>$st </font></td>
						</tr>";

				}
	
				$i+=1;
			}
			if(empty($table)) {
				$table .= "<tr>
						<td><font face='Arial, Helvetica, sans-serif'>No Entries!</font></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>";
			}
		}
	
	//close database connections	
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
	  <li ><a href="../User/main.php">Main</a></li>
          <li><a href="squadMainPage.php">View Squad Members</a></li>
          <li class="active"><?=$nav_admin_menu?></li>
          <li><a href="ViewSquadTeams.php"> View Squad Teams</a></li>
	  <li ><a href="../User/process.php">Log Out</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
	<?=$form_opt_menu_open?>
		<table border="0" cellspacing="2" cellpadding="2" id="squads">
			<tr>
				<?=$table_head?>
			</tr>
				<?=$table?> 
		</table>

	<?=$form_opt_menu_close?>

      </div>
    </div>
  </div>
  
</div>
</body>
</html>


