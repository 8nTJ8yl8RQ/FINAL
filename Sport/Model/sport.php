<?php

class Team
{
	public $id;
	public $teamName;
	public $sportId;
	public $coachIds;
	public $squadId;
	
	function __construct($inId=null, $inTeamName=null, $inSportId=null, $inCoachIds=null, $inSquadId=null)
		{
			if (!empty($inId))
			{
			$this->id = $inId;
			}
			
			if (!empty($inTeamName))
			{
			$this->teamName = $inTeamName;
			}
			
			if (!empty($inSportId))
			{
			$this->sportId = $inSportId;
			}
			
			if (!empty($inCoachIds))
			{
			$this->coachIds = $inCoachIds;
			}
			
			if (!empty($inSquadId))
			{
			$this->squadId = $inSquadId;
			}
		
		}

}
?>