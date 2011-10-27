<?php

//getSquadMembers display - Last name, first name, Squad, Team, Sport, Status

class SquadMemView {
       
	public $MemId;
	public $sqId;
	public $name;
	public $status;
	public $squadkind;
	public $gender;	

	//copy construct
	public function __construct($mid, $sid, $nm, $st, $sqk, $gndr){	
	$this->MemId     = $mid;
	$this->sqId      = $sid;
	$this->name      = $nm ;
	$this->status    = $st ;
	$this->squadkind = $sqk;
	$this->gender    = $gndr;

	}

}

//get teams by squad
//squad, team

//promote individually

?>
