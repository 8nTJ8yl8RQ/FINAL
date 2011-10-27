<?php
include 'includes/DBconnect.php';
include 'model/at_address.php';



function at_addressAdd($inAddressID=NULL, $inStreet=NULL, $inCity=NULL, $inCountry=NULL, $inProvince=NULL, 
					   $inPostalCode=NULL,$inBarangay=NULL)
{
		$query=mysql_query("INSERT INTO At_Address(AddressID, Street, City, Country, Province, PostalCode, Barangay)
							VALUES('$inAddressID','$inStreet','$inCity','$inCountry','$inProvince',
							       '$inPostalCode','$inBarangay')");

}
function at_addressUpdate($inAddressID=NULL, $inStreet=NULL, $inCity=NULL, $inCountry=NULL, $inProvince=NULL, 
					   $inPostalCode=NULL,$inBarangay=NULL)
{
	     $sql_stmt = "UPDATE At_Address SET
		                       AddressID='".$inAddressID."',Street='".$inStreet."',City='".$inCity."',Country='".$inCountry."',
							   Province='".$inProvince."',PostalCode='".$inPostalCode."',Barangay='".inBarangay."' 
							   WHERE at_address.AddressID='".$inAddressID."'";
					   
		 mysql_query($sql_stmt);	
}

?>

