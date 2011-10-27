<?php

class Coach
{

public $id;
public $name;
public $SSSNo;
public $address;
public $telNo;
public $mobileNo;
public $email;


function __construct($inId=null, $inName=null, $inSSSNo=null, $inAddress=null, $inTelNo=null, $inMobileNo=null, $inEmail=null){
		if (!empty($inId))
		{
			$this->id = $inId;
		}
		
		if (!empty($inName))
		{
			$this->name = $inName;
		}
		
		if (!empty($inSSSNo))
		{
			$this->SSSNo = $inSSSNo;
		}
		
		if (!empty($inAddress))
		{
			$this->address = $inAddress;
		}
		
		if (!empty($inTelNo))
		{
			$this->telNo = $inTelNo;
		}
		
		if (!empty($inMobileNo))
		{
			$this->mobileNo = $inMobileNo;
		}
		
		if (!empty($inEmail))
		{
			$this->email = $inEmail;
		}
		
	}
	
}
?>