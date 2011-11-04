<?php
include 'includes/DBconnect.php';
include_once 'model/guardian.php';

function guardianAdd($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                     $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL)
    {
		$query=mysql_query("INSERT INTO Guardian(GID, AddressID, FirstName, Surname, Middlename, TelNumber, EMail)
		                   VALUES (NULL,'$inAddressID','$ingFirstName','$ingSurname','$ingMiddlename','$ingTelNumber','$ingEmail')");
	
	    
	} 
	
function guardianUpdate($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                        $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL) 
{
		$query=mysql_query("UPDATE Guardian SET
							GID='".$inGID."',AddressID='".$inAddressID."',FirstName='".$ingFirstName."',Surname='".$ingSurname."',
							Middlename='".$ingMiddlename."',TelNumber='".$ingTelNumber."',EMail='".$ingEmail."'
							WHERE Guardian.GID='".$inGID."'");
}


?>
