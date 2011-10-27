<?php
include 'includes/DBconnect.php';
include 'model/athlete.php';


function athleteAdd($inMemID=NULL,$inGID=NULL, $inAddID=NULL,$inRelID=NULL, $inFname=NULL, $inSname=NULL, $inDBirth=NULL, 
                     $inPayDate=NULL, $inMI=NULL, $inGen=NULL, $inTelNo=NULL, $inEmail=NULL)
	{
 		$query = mysql_query("INSERT INTO Athlete(MembershipID,GID,AddressID,RelID,FirstName,Surname,DateOfBirth,PaymentDate,
							                      MiddleInitial,Gender,TelNumber,Email) 								
							 VALUES(NULL,'$inGID', '$inAddID','$inRelID', '$inFname', '$inSname', '$inDBirth','$inPayDate', 
							 		'$inMI', '$inGen', '$inTelNo', '$inEmail')"); 

	}


function athleteUpdate(Athlete &$at)
	{

									 
  		$sql_stmt ="UPDATE  Athlete SET FirstName='".$at->FirstName."',Surname='".$at->Surname."',DateOfBirth='".$at->DateOfBirth."',PaymentDate='".$at->PaymentDate."',MiddleInitial='".$at->MiddleInitial."',Gender='".$at->Gender."', RelID='".$at->RelID."',TelNumber='".$at->TelNumber."',Email='".$at->Email."' WHERE Athlete.MembershipID='".$at->MembershipID."' ";


		$query = mysql_query($sql_stmt);
              
	}
	
function athleteDeleteRec($inMemID=NULL)
	{
	

       $query=mysql_query("DELETE t2,t3,t4,t5 FROM Athlete t1 LEFT JOIN AthleteStatus t2 ON (t1.MembershipID=t2.MembershipID)
	                       LEFT JOIN TeamMemDetails t3 ON (t1.MembershipID= t3.MembershipID) LEFT JOIN SquadMemDetails t4 ON 
	                       (t1.MembershipID= t4.MembershipID) LEFT JOIN AthleteGrades t5 ON (t1.MembershipID=t5.MembershipID)
	                        WHERE t1.MembershipID = $inMemID"); 
		mysql_query("DELETE t1 FROM Athlete t1 WHERE t1.MembershipID = $inMemID");


	}

?>
