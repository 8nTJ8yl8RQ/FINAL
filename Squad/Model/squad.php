<?php



class Squad {

public $SquadID;

public $SquadKind;

function __construct(
  $inId=null
, $inKind=null
){

		if (!empty($inId))
		{
			$this->SquadID= $inId;
		}
		if (!empty($inKind))
		{
			$this->SquadKind = $inKind;
		} 
		
}
/*
// constructor 

	$this->db = $db;

	if (!empty($inId)) {
		$sql_stmt  = "SELECT * FROM Squad WHERE SquadID='" . $inId . "'"; 

	} else if (!empty($inKind)) {
		$sql_stmt = "SELECT * FROM Squad WHERE SquadKind = '" .$inKind. "'"; 
		
	} 
	
	$this->db->query($sql_stmt);
	
	$this->data = $this->db->fetch();
	
	if ($this->db->countRows() === 1 ) {
		$this->SquadID   = $this->data['SquadID'];
		$this->SquadKind = $this->data['SquadKind'];
	} 
	    
}

function renameSquad($inKind = null){
	if (!empty($inKind)) {
		$this->SquadKind = $inKind;
		$sql_stmt = "UPDATE Squad SET SquadKind ='". $this->SquadKind. "' WHERE SquadID = '". $this->SquadID. "'"; 
		$this->db->query($sql_stmt);
	}
}

function AddSquad($inSquadKind = null) {
		$sql_stmt = "INSERT INTO Squad(SquadKind) VALUES ('". $inSquadKind ."')"; 
		$this->db->query($sql_stmt);
}

function DeleteSquad($inKind=null) {
		$sql_stmt = "DELETE FROM Squad WHERE SquadKind='".$inKind."'"; 
		$this->db->query($sql_stmt);
}


// save class properties to MySQL table

public function __destruct() {
//	$this->db->query("UPDATE Squad SET SquadID = '$this->SquadID', SquadKind = '$this->SquadKind' WHERE SquadID = $this->SquadID");
}

*/
				
}//end Squad Class
	
?>