<?php
include 'includes/DBconnect.php';
include_once 'model/guardian.php';

function guardianAdd($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                     $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL)
    {
		$query=mysql_query("INSERT INTO Guardian(GID, AddressID, FirstName, Surname, Middlename, TelNumber, Email)
		                   VALUES (NULL,'$inAddressID','$ingFirstName','$ingSurname','$ingMiddlename','$ingTelNumber','$ingEmail')");
	
	    
	} 
	
function guardianUpdate($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                        $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL) 
{
		$query=mysql_query("UPDATE Guardian SET
							GID='".$inGID."',AddressID='".$inAddressID."',gFirstName='".$ingFirstName."',gSurname='".$ingSurname."',
							gMiddleName='".$ingMiddlename."',TelNumber='".$ingTelNumber."',Email='".$ingEmail."'
							WHERE Guardian.GID='".$inGID."'");
}


?>
