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
	
	//copy construct
	public function __construct($sp, $gr, $mid, $nm, $st){	
		$this->sport    = $sp ;
		$this->grade    = $gr ;
		$this->memId    = $mid;
		$this->name     = $nm ;
		$this->status   = $st ;
	}

}

?>
