<?php

//getSquadMembers display - Last name, first name, Squad, Team, Sport, Status
//+-----+---------+-----------------+--------+----------------+
//| MID | SquadID | Name            | Status | Squad          |
//+-----+---------+-----------------+--------+----------------+

class SquadMemView {
       
	public $MemId;
	public $sqId;
	public $name;
	public $status;
	public $squadkind;	

//copy construct
public function __construct($mid, $sid, $nm, $st, $sqk){	
	$this->MemId     = $mid;
	$this->sqId      = $sid;
	$this->name      = $nm ;
	$this->status    = $st ;
	$this->squadkind = $sqk;
}
//this information can be gathered from the following tables;
//Squad, SquadMemDetails, Athlete, AthleteGrades-Sport for training Squad, 

//}

//get athlete grades candidate for squad promotion
//membership id, Last Name, First Name, Grade
//class squadViewTrainingMember {


}

//get teams by squad
//squad, team

//promote individually

?>
