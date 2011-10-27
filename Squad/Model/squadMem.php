<?php

class SquadMem
{

public $MembershipID;
public $SquadID;


function __construct(
$inMemID       = null
, $inSquadID   = null
)	{
		if (!empty($inMemID))
		{
			$this->MembershipID = $inMemID;
		}
		if (!empty($inSquadID))
		{
			$this->squadID = $inSquadID;	
		}
       
	}	
	
}
?>
