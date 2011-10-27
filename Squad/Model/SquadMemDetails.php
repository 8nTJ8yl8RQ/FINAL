<?php

class SquadMemDetails {

public $MembershipID;
public $SquadID;


function __construct(
  $inMemId=null
, $inSqdId=null
){

		if (!empty($inMemId))
		{
			$this->MembershipID= $inMemId;
		}
		if (!empty($inSqdId))
		{
			$this->SquadID = $inSqdId;
		} 
		
}
}//end Class
?>

