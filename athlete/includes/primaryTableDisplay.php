<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>primeTableDisplay</title>
</head>

<body>
<center>
<table border="1" cellspacing="0" align="center" width="80%" id="teams" >
	<tr>
	<!---th><font face="Arial, Helvetica, sans-serif">Edit</font></th--->
	<!---th><font face="Arial, Helvetica, sans-serif">Del</font></th--->
	<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
	<!--th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Surname</font></th-->
    <th><font face="Arial, Helvetica, sans-serif">Athlete</font></th>
    	<th><font face="Arial, Helvetica, sans-serif">Gender</font></th>
 	<th><font face="Arial, Helvetica, sans-serif">Birthday</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Phone Number</font></th>
 	<th><font face="Arial, Helvetica, sans-serif">E-mail</font></th>
	<th><font face="Arial, Helvetica, sans-serif">Payment Date</font></th>
	<!-- th><font face="Arial, Helvetica, sans-serif">Address</font></th -->
	<!-- th><font face="Arial, Helvetica, sans-serif">Sport</font></th -->
	</tr>

<?php

include('includes/athleteAfterDelete.php');
while ($myrow = mysql_fetch_array($result))
{
?>
    <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["MembershipID"];?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Surname"];?>,</font>
	    <font face="Arial, Helvetica, sans-serif"><?php echo $myrow["FirstName"];?></font>	
	    <font face="Arial, Helvetica, sans-serif"><?php echo $myrow["MiddleInitial"];?></font></td>
    <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Gender"];?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["DateOfBirth"];?></font></td>
    <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["TelNumber"];?></font></td>
    <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["Email"];?></font></td>	
    <td><font face="Arial, Helvetica, sans-serif"><?php echo $myrow["PaymentDate"]; ?></font></td>
	</tr>


<?php
}
echo "</TABLE>";
mysql_free_result($result);
mysql_close();

?>
</center>
</body>
</html>
