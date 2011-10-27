<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Athlete</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>

<?php include('Dao/athleteDao.php');?>
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
		  <li class="active"><a href="athleteView.php">Athlete list</a></li>
          <li><a href="athleteAdd.php">Add athlete</a></li>
          <li><a href="athleteUpdate.php">Update athlete Record</a></li>
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
   

    <form action="athleteSearchResult.php" method="post">
	Choose Search type:
	<select name="searchtype">
	   <option value="Surname">Last name</option>
           <option value="FirstName">First name</option>
           <option value="City">Address</option>
           <option value="Sport">Sport</option>
           <option value="SquadKind">Squad</option>
           <option value="TeamName">Team</option>
           <option value="StatusKind">Status</option>         
	</select>	
	Enter Search Term:
	<input name ="searchterm" type="varchar">        
	<input type="submit" value="Search">
        <?php echo "<a href='athleteView.php'>Display all</a>"; ?>  
     </form> 

	
	 
</div>

<center>
<table border="1" cellspacing="0" align="center" id="teams">
	<tr>

    <th><font face="Arial, Helvetica, sans-serif">Athlete</font></th>
    <th><font face="Arial, Helvetica, sans-serif">Gender</font></th>
 	<th><font face="Arial, Helvetica, sans-serif">BirthDate</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Phone number</font></th>
 	<th><font face="Arial, Helvetica, sans-serif">Email Address</font></th>
	<!--th><font face="Arial, Helvetica, sans-serif">Gender</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Squad</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Sport</font></th-->
	</tr>

 
<?php
include ('includes/athleteSearchProcess.php');
while ($myrow = mysql_fetch_array($result))
{
?>

	<td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Surname"];?>,</font>
		<font face="Arial, Helvetica, sans-serif"><?php echo $myrow["FirstName"];?></font>
		<font face="Arial, Helvetica, sans-serif"><?php echo $myrow["MiddleInitial"];?></font></td>
        <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Gender"];?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["DateOfBirth"];?></font></td>
     	<td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["TelNumber"];?></font></td>
        <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Email"];?></font></td>
	<!--td><font face="Arial, Helvetica, sans-serif"><--?php echo $myrow["ath_status"];?></font></td>
        <td><font face="Arial, Helvetica, sans-serif"><-?php echo $myrow["ath_squad"];?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><-?php echo $myrow["ath_sport"];?></font></td-->
	</tr>


<?php
}
echo "</TABLE>";
mysql_free_result($result);
mysql_close();

?>

	<div class="editDelete">
	</div>
	
	</div>
	</div>

</div>


</body>
</html>
