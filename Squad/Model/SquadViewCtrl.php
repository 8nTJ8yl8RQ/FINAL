<?php
class SquadViewCtrl {
	public $cur_state;//View, Edit, Update
	
        private $next_state;

	//public $trigg;
	//public $req;
	
	
	//view
	public function __construct() {
		$this->state ='View';
	}
	
	public function transition_request($trigger, $request) {
		if(!trigger){
			if($cur_state==='View',	$request ==='Edit') {
				$new_state='Edit';
			}else if ($cur_state==='Edit',	$request ==='Update') {
				$new_state='Update';
			}else{
				$new_state ='View';
			}
		}

	}
		

}

?>
