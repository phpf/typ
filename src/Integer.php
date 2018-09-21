<?php
namespace phpram\typ;
class Integer extends DataType {

	protected static $shortType = 'i';
	protected $value;
	
	function Integer( $input ){
		if( is_int(intval($input)) ){
			$this->value = intval($input);
		} else {
			throw new \Exception("Invalid integer");
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