<?php
namespace phpram\typ;
class Floaty extends DataType {

	protected static $shortType = 'd';
	protected $value;
	
	function __construct( $input ){
		if( is_float(floatval($input)) ){
			$this->value = floatval($input);
		} else {
			throw new \Exception("Invalid float");
		}
	}
	
	public function __toString() {
		return ($this->value."");
	}
	
	public function getValue(){
		return $this->value;
	}
	
}

?>