<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Search</title>
</head>
<body>
<?php
Class searchType
{

	public $Surname;
    public $FirstName;
    public $City;
    public $Sport;
    public $SquadKind;
    public $TeamName;
    public $StatusKind;
    
    function __construct($inSurname=NULL, $inFirstname=NULL, $inCity=NULL, $inSport=NULL,
     					$inSquadkind=NULL, $inTeamname=NULL, $inStatuskind=NULL)
	{
	 if (!empty($inSurname))
	     $this->Surname=$inSurname;
	 if (!empty($inFirstname))
	 	 $this->FirstName=$inFirstname;
	 if (!empty($inCity))
	     $this->City=$inCity;
	 if (!empty($inSport))
	 	 $this->Sport=$inSport;
	 if (!empty($inSquadkind))
	     $this->SquadKind=$inSquadkind;
	 if (!empty($inTeamname))
	 	 $this->TeamName=$inTeamname;
	 if (!empty($inStatuskind))
	 	 $this->StatusKind=$inStatuskind;
		 
		 	
	}
   
}
?>
</body>
</html>
