<?php

class Practice
{

public $practiceId;
public $teamId;
public $date;
public $time;
public $venue;

function __construct($inPracticeId=null, $inTeamId=null, $inDate=null, $inTime=null, $inVenue=null){
		if (!empty($inPracticeId))
		{
			$this->practiceId = $inPracticeId;
		}
		
		if (!empty($inTeamId))
		{
			$this->teamId = $inTeamId;
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
		
	}
	
}
?>