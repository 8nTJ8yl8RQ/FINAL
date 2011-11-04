<?php

class Athelete
{

public $id;
public $name;

function __construct($inId=null, $inName=null){
		if (!empty($inId))
		{
			$this->id = $inId;
		}
		
		if (!empty($inName))
		{
			$this->name = $inName;
		}
		
	}
	
}
?>