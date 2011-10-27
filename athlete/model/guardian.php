<title>Guardian</title>
<?php

class Guardian
{
        public $GID;
		public $AddressID;
		public $gFirstName;
		public $gSurname;
		public $gMiddlename;
		public $gTelNumber;
		public $gEmail;
		
        function __construct($inGID=NULL,$inAddressID=NULL, $ingFirstName=NULL, $ingSurname=NULL, $ingMiddlename=NULL,
		                     $ingTelNumber=NULL, $ingEmail=NULL)
		{
				if (!empty($inGID))
				{
				 $this->GID=$inGID;
				 }
				 if(!empty($inAddressID))
				 {
				 $this->AddressID=$inAddressID;
				 }
				 if(!empty($ingFirstName))
				 {
				 $this->gFirstName=$ingFirstName;
				 }
				 if(!empty($ingSurname))
				 {
				 $this->gSurname=$ingSurname;
				 }
				 if(!empty($ingMiddlename))
				 {
				 $this->gMiddlename=$ingMiddlename;
				 }
				 if(!empty($ingTelNumber))
				 {
				 $this->gTelNumber=$ingTelNumber;
				 }
				 if(!empty($ingEmail))
				 {
				 $this->gEmail=$ingEmail;
				 }
		}
		
}


?>
       