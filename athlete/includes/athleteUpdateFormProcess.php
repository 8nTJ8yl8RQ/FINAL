<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Process Updated form</title>
</head>

<body>
<?php
	$id=$_POST['id'];
    
     include'includes/DBconnect.php';

	$query="SELECT * FROM Athlete, At_Address, Guardian WHERE  Athlete.GID=Guardian.GID 
	        AND Athlete.AddressID=At_Address.AddressID AND Athlete.MembershipID='$id'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
        if (!$num) die("No such id in the list!"); 
        $i=0;
		
		
		$gid=mysql_result($result,$i,"GID");
		$addressid=mysql_result($result,$i,"AddressID");
		//echo "frm querry: GID =".$gid." \n address id = ". $addressid."\n";
		
		$kinship=mysql_result($result,$i,"RelID");
		$surname=mysql_result($result,$i,"Surname");
        	$firstname=mysql_result($result,$i,"FirstName");
        	$middlename=mysql_result($result,$i,"MiddleInitial");
		$gender=mysql_result($result,$i,"Gender");
		$birthday=mysql_result($result,$i,"DateOfBirth");
        	$phonenumber=mysql_result($result,$i,"TelNumber");
        	$email=mysql_result($result,$i,"Email");
        	$paymentdate=mysql_result($result,$i,"PaymentDate");
		//Update for address-->
		$barangay=mysql_result($result,$i,"Barangay");
        	$street=mysql_result($result,$i,"Street");
        	$city=mysql_result($result,$i,"City");
		$province=mysql_result($result,$i,"Province");
		$country=mysql_result($result,$I,"Country");
		$zipcode=mysql_result($result,$i,"PostalCode");
		//Update for guardian-->
		$glastname=mysql_result($result,$i,"Surname");
		$gfirstname=mysql_result($result,$i,"FirstName");
		$gmiddlename=mysql_result($result,$i,"Middlename");
		$gphonenumber=mysql_result($result,$i,"TelNumber");
		$gemail=mysql_result($result,$i,"Email");
?>
</body>
</html>
