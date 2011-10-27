<?php

class Competition
{
	public $id;
	public $compName;
	public $date;
	public $time;
	public $venue;
	public $teamId;
	
	function __construct($inCompId=null, $inCompName=null, $inDate=null, $inTime=null, $inVenue=null, $inTeamId=null)
		{
			if (!empty($inCompId))
			{
			$this->id = $inCompId;
			}
			
			if (!empty($inCompName))
			{
			$this->compName = $inCompName;
			}
			
			if (!empty($inDate))
			{
			$this->date = $inDate;
			}
			
			if (!empty($inTime))
			{
			$this->time = $inTime;
			}
			
			if (!empty($inVenue))
			{
			$this->venue = $inVenue;
			}
			
			if (!empty($inTeamId))
			{
			$this->teamId = $inTeamId;
			}
		}
}
?>