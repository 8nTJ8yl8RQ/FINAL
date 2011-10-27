<title>class at_address</title>
<?PHP

class at_address
{

	public $AddressID;
	public $Street;
	public $City;
	public $Country;
	public $Province;
	public $PostalCode;
	public $Barangay;
	
	function __construct($inAddressID=NULL, $inStreet=NULL, $inCity=NULL, $inCountry=NULL, $inProvince=NULL, $inPostalCode=NULL, 		 						$inBarangay=NULL)
	{
			if(!empty($inAddressID))
			{
				$this->AddressID=$inAddressID;
			}
			if(!empty($inStreet))
			{
				$this->Street=$inStreet;
			}
			if(!empty($inCity))
			{
				$this->City=$inCity;
			}
			if(!empty($inCountry))
			{
				$this->Country=$inCountry;
			}
			if(!empty($inProvince))
			{
				$this->Province=$inProvince;
			}
			if(!empty($inPostalCode))
			{
				$this->PostalCode=$PostalCode;
			}
			if(!empty($inBarangay))
			{
				$this->Barangay=$inBarangay;
			}
	}
	
}
?>