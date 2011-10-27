<?php

class Athlete
{
     public $MembershipID;
     public $GID;
     public $AddressID;
     public $RelID;
     public $FirstName;
     public $Surname;
     public $DateOfBirth;
     public $PaymentDate;
     public $MiddleInitial;
     public $Gender;
     public $TelNumber;
     public $Email;
	 

function __construct($inMemID=null,$inGID=null, $inAddID=null,$inRelID=null, $inFname=null, $inSname=null, $inDBirth=null, 
                     $inPayDate=null, $inMI=null, $inGen=null, $inTelNo=null, $inEmail=null)
		{
		    if (!empty($inMemID))
			{
			$this->MembershipID=$inMemID;
			}
			if (!empty($inAddID))
			{
			$this->AddressID= $inAddID;
			}			
			if (!empty($inRelID))
			{
			$this->RelID= $inRelID;
			}
            if(!empty($inFname))
            {
            $this->FirstName = $inFname;
            }
			if (!empty($inSname))
			{
			$this->Surname = $inSname;
			}
			if (!empty($inDBirth))
			{
			$this->DateOfBirth= $inDBirth;
			}
			if (!empty($inPayDate))
			{
			$this->PaymentDate= $inPayDate;
			}
	        if(!empty($inMI))
			{
			$this->MiddleInitial=$inMI;
			}
			if(!empty($inGen))
			{
			$this->Gender=$inGen;
			}
			if(!empty($inTelNo))
			{
			$this->TelNumber=$inTelNo;
			}
			if(!empty($inEmail))
			{
			$this->Email=$inEmail;
			}
			
		
		}

}
?>