<?php
	require_once "../User/include/session.php";
	
	if(!($session->logged_in)){
		Location("header : ../User/main.php");
		exit(1);
	}
?>
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
<style type="text/css">
<!--
.style1 {color: #000000}
.style2 {color: #FFFFFF}
.style3 {color: #FFFF00}
.style4 {color: #FFFFCC}
.style5 {color: #FF0000}
.style7 {color: #000000; font-family: Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<body>
<!-- ?php include('includes/includes.php');? -->


<div class="main">
  <div class="header">
    <div class="header_resize">

      <div class="clr"></div>
      <div class="htext">
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li ><a href="../User/main.php">Home</a></li>	
		  <li><a href="athleteView.php">Athlete list</a></li>
          <li class="active"><a href="athleteAdd.php">Add athlete</a></li>
          <li><a href="athleteUpdate.php">Update athlete Record</a></li>
          <li><a href="athleteDelete.php">Delete a record</a></li>
	 <li ><a href="../User/process.php">Log Out</a></li>
          <!--li><a href="searchTeam.php">Team</a></li>
		  <li><a href="">Coach</a>
          <li><a href="contact.html">Contact Us</a></li-->
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
 
	
<div class="searchTeam">

</div>



 <p><span class="style5">Fields  in  *  are  required  fields.</span></p> 
   <center>
 
 <form action="athleteAfterAdd.php" method="post">
  
<table cellspacing="0" border="1" align="center" width="80%" id="teams">
        <th colspan="3">A t h l e t e ' s          P r o f i l e</th>
        <tr>
        <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Last Name:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </font>
            <input type="varchar" name="surname"/>
        </span></td>
        <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>First Name:</font><span class="style2">--------</span>
            <input type="varchar" name="firstname"/>
        </span></td>
        <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Middle Name:<span class="style2">------- ----</span> </font>
          <input type="varchar" name="middlename"/>
        </span></td>
        </tr>

        <tr>
        <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">-</span> &nbsp;&nbsp;&nbsp;</font>
          <input type="varchar" name="gender"/>
        </span></td>
        <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Birthday: [yyyy-mm-dd]</font><span class="style4">-----------
            </span>
          <input type="varchar" name="birthday"/>
        </span></td>
        <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Phone number:</font><span class="style4">---------</span>
          <input type="varchar" name="phonenumber"/>
        </span></td>
        </tr>
	
        <tr>
          <td bgcolor="#FFFFFF"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Email:<span class="style4">------------</span></font>
                <input type="varchar" name="email" />
          </span></td>
          <td height="37"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Barangay: <span class="style2">-- ------</span> </font>
                <input type="varchar" name="barangay" />
          </span></td>
          <td height="37"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Street: <span class="style2">-------------------</span> </font>
              <input type="varchar" name="street" />
        </span></td>
        </tr>

        <tr bgcolor="#FFFFCC">
          <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>City:<span class="style2"><span class="style4">-----------</span></span></font><span class="style4">---</span>
                <input type="varchar" name="city" />
          </span></td>
          <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Province:&nbsp;&nbsp;<span class="style4">----</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                <input type="varchar" name="province" />
          </span></td>
          <td height="37" bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Country: <span class="style4">-----------------</span> </font>
                <input type="varchar" name="country" />
          </span></td>
        </tr>

        <tr bgcolor="#FFFFFF">
          <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>ZipCode:<span class="style4">--- </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                <input type="varchar" name="zipcode" />
          <!--/span></td>
          <td><span class="style2"><span class="style7">Team:</span>a--------------</span><span class="style1">
            <input type="varchar" name="team" />
          </span></td>
          <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style4"><span class="style1">Squad:</span>---------------------</span></font>
              <input type="varchar" name="squad" />
        </span></td>
        </tr>
        <tr bgcolor="#FFFFCC">
          <td><span class="style1"><font face="Arial, Helvetica, sans-serif">Sport:</font><span class="style2">------------ </span>
                <input type="varchar" name="sport" />
          </span></td>
          <td bgcolor="#FFFFCC"><span class="style1"><font face="Arial, Helvetica, sans-serif">Status:</font><span class="style2">--------------- </span>
                <input type="varchar" name="status" /-->
          </span></td>
          <td bgcolor="#FFFFCC"><span class="style1"> Payment Date:[yyyy-mm-dd] </span><span class="style4">----------</span><span class="style1">
            <input type="varchar" name="paymentdate" />
          </span></td>
        </tr>

        <th colspan="3">A t h l e t e ' s         G u a r d i a n</th>
        
	<tr>
        <td><span class="style1"><span class="style5">*</span>Last Name:<span class="style2">-----</span>
        <input type="varchar" name="glastname"/>
      </span></td>
	<td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>First Name:</font><span class="style2">--------</span>
	    <input type="varchar" name="gfirstname"/>
	</span></td>
	<td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Middle Name:<span class="style2">------------</span></font>
	    <input type="varchar" name="gmiddlename"/>
	</span></td>
    </tr>
        <tr bgcolor="#FFFFCC">
	<td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Kinship:</font><span class="style4">---------</span>
	  <select name="kinship" >
        <option value="3">Legal guardian</option>
        <option value="1">Mother</option>
        <option value="2">Father</option>
        <option value="5">Brother</option>
        <option value="4">Sister</option>
      </select >
	  <!--input type="varchar" name="kinship"-->
	</span></td>
	<td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Phone Number:<span class="style4">---</span></font>
	  <input type="varchar" name="gphonenumber"/>
	</span></td>
        <td><span class="style1"><font face="Arial, Helvetica, sans-serif"><span class="style5">*</span>Email Address:</font><span class="style4">----------</span>
            <input type="varchar" name="gemail" /></span></td>
        </tr>
</table>
</center >

	<div class="editDelete">
	  <input type="submit" name="submit" value="S   u   b   m   i   t"/>
	</div>
	
	</div>
	</div>

</div>
</form>

</body>
</html>
