<?php
include 'includes/DBconnect.php';
include 'model/athlete.php';


function athleteAdd($inMemID=NULL,$inGID=NULL, $inAddID=NULL,$inRelID=NULL, $inFname=NULL, $inSname=NULL, $inDBirth=NULL, 
                     $inPayDate=NULL, $inMI=NULL, $inGen=NULL, $inTelNo=NULL, $inEmail=NULL)
	{
 		$query = mysql_query("INSERT INTO athlete(MembershipID,GID,AddressID,RelID,FirstName,Surname,DateOfBirth,PaymentDate,
							                      MiddleInitial,Gender,TelNumber,Email) 								
							 VALUES(NULL,'$inGID', '$inAddID','$inRelID', '$inFname', '$inSname', '$inDBirth','$inPayDate', 
							 		'$inMI', '$inGen', '$inTelNo', '$inEmail')"); 

	}


function athleteUpdate(Athlete &$at)
	{

									 
  		$sql_stmt ="UPDATE  athlete SET FirstName='".$at->FirstName."',Surname='".$at->Surname."',DateOfBirth='".$at->DateOfBirth."',PaymentDate='".$at->PaymentDate."',MiddleInitial='".$at->MiddleInitial."',Gender='".$at->Gender."', RelID='".$at->RelID."',TelNumber='".$at->TelNumber."',Email='".$at->Email."' WHERE athlete.MembershipID='".$at->MembershipID."' ";


		$query = mysql_query($sql_stmt);
              
	}
	
function athleteDeleteRec($inMemID=NULL)
	{
	

       $query=mysql_query("DELETE t2,t3,t4,t5 FROM athlete t1 LEFT JOIN athletestatus t2 ON (t1.MembershipID=t2.MembershipID)
	                       LEFT JOIN teammemdetails t3 ON (t1.MembershipID= t3.MembershipID) LEFT JOIN squadmemdetails t4 ON 
	                       (t1.MembershipID= t4.MembershipID) LEFT JOIN athletegrades t5 ON (t1.MembershipID=t5.MembershipID)
	                        WHERE t1.MembershipID = $inMemID"); 
		mysql_query("DELETE t1 FROM athlete t1 WHERE t1.MembershipID = $inMemID");


	}

?>