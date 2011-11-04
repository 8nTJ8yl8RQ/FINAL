<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Athletes</title>
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

      <div class="clr"></div>
      <div class="htext">
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html">Home</a></li>
		  <li><a href="athleteView.php">Athlete list</a></li>
          <li><a href="athleteAdd.php">Add athlete</a></li>
          <li class="active"><a href="athleteUpdate.php">Update athlete Record</a></li>
          <li><a href="athleteDelete.php">Delete a record</a></li>

        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
 
	
<div class="searchTeam">
<?php include'includes/athleteSearch.php';?>


</div>

<?php

include_once 'Dao/addressDao.php';
include_once 'Dao/guardianDao.php';
include_once 'Dao/athleteDao.php';
      echo '<center>';
    $id=$_POST["ud_id"];
	

  if(!$_POST["surname"] || !$_POST["firstname"] || !$_POST["middlename"]  || !$_POST["gender"] 
          || !$_POST["birthday"]  || !$_POST["phonenumber"] || !$_POST["email"] ||!$_POST["barangay"] 
          ||!$_POST["street"]||!$_POST["city"]|| !$_POST["province"] || !$_POST["country"]|| !$_POST["zipcode"]
          || !$_POST["paymentdate"]|| !$_POST["glastname"]|| !$_POST["gfirstname"] || !$_POST["gmiddlename"]|| !$_REQUEST["kinship"]
          || !$_POST["gphonenumber"]|| !$_POST["gemail"])
        // !$_POST["team"]|| !$_POST["squad"]|| !$_POST["sport"]|| !$_POST["status"] ||
      {
        
 	echo 'Please fill up required fields!.';

	exit;
      }
   else
      { 
	  
					
      $athlete=$_POST["ud_id"];

		
	  $guardian=$_POST["gid_"];
	  $address=$_POST["addressid_"];
							

	  
	   at_addressUpdate($address,$_POST["street"],$_POST["city"],$_POST["country"],
      $_POST["province"],$_POST["zipcode"],$_POST["barangay"]);
      	
		$my_ath = new Athlete(
		$id
 		,$guardian
		,$address
		,$_POST["kinship"]
 		,$_POST["firstname"]
		,$_POST["surname"]
		,$_POST["birthday"]
		,$_POST["paymentdate"]
		,$_POST["middlename"]
		,$_POST["gender"]
		,$_POST["phonenumber"]
		,$_POST["email"]
		);

	   
	   athleteUpdate($my_ath);
	   

	   
       guardianUpdate($guardian,$address,$_POST["gfirstname"],$_POST["glastname"],$_POST["gmiddlename"],
       $_POST["gphonenumber"],$_POST["gemail"]);	   

      echo '<center><strong><h3>' ;
       echo'You have successfully updated ID number : '.$_POST["ud_id"].'&nbsp;&nbsp;&nbsp;'.$_POST["firstname"].'&nbsp;&nbsp;&nbsp;'.$_POST["middlename"].				                                            '&nbsp;&nbsp;&nbsp;'.$_POST["surname"].'!';
	   echo '</h3></strong></center>';
     exit;
      }
     echo'</center>';
?>


	
	</div>
	</div>

</div>


</body>
</html>
