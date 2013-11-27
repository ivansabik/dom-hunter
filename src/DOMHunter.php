<?

class DOMHunter
{
	/*
	 -url
	 -request type
	 -params
	 -browser
	 -custom headers
	 */
	 
    public $targetUrl;
    public $requestType;
    
    private $curlConnection;

    public function __construct($targetUrl)
    {
        $this->targetUrl = $targetUrl;
    }
    
    public function addPreyCharacteristic() {
	}
	
	public function huntTable() {
	}
	
	public function huntSingle() {
	}
	
	public function huntHerd() {
	}
	
	public function hunt() {
	}
	
}
?>
