<?php
include 'includes/DBconnect.php';
include_once 'model/guardian.php';

function guardianAdd($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                     $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL)
    {
		$query=mysql_query("INSERT INTO guardian(GID, AddressID, gFirstName, gSurname, gMiddlename, gTelNumber, gEmail)
		                   VALUES (NULL,'$inAddressID','$ingFirstName','$ingSurname','$ingMiddlename','$ingTelNumber','$ingEmail')");
	
	    
	} 
	
function guardianUpdate($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL,
                        $ingMiddlename=NULL,$ingTelNumber=NULL,$ingEmail=NULL) 
{
		$query=mysql_query("UPDATE guardian SET
							GID='".$inGID."',AddressID='".$inAddressID."',gFirstName='".$ingFirstName."',gSurname='".$ingSurname."',
							gMiddleName='".$ingMiddlename."',gTelNumber='".$ingTelNumber."',gEmail='".$ingEmail."'
							WHERE guardian.GID='".$inGID."'");
}


?>