<?php
//+------------+-------+--------------+-----------------+--------+
//| Sport      | Grade | MembershipID | Name            | Status |
//+------------+-------+--------------+-----------------+--------+
class TrainingSquadMemView {
	public $sport;	
	public $grade;
	public $memId;
	public $name;
	public $status;
	public $gender;
	public $position;
	public $isPrimePos;
	public $team;
	
	//copy construct
	public function __construct($sp, $gr, $mid, $nm, $st,$gen,$pos,$isPri, $tm){	
		$this->sport    	= $sp ;
		$this->grade    	= $gr ;
		$this->memId    	= $mid;
		$this->name     	= $nm ;
		$this->status   	= $st ;
		$this->gender		= $gen;
		$this->position		= $pos;
		$this->isPrimePos	= $isPri;
		$this->team		= $tm;
	}

}

?>
