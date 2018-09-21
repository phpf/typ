<?php
namespace phpram\typ;
class Boolean extends DataType {
	
	protected $value;
	
	function __construct( $input ){
		if(     (string)$input == "true"  ) $this->value = true;
		elseif( (string)$input == "yes"   ) $this->value = true;
		elseif( (string)$input == "on"   ) $this->value = true;
		elseif( (string)$input === "1"    ) $this->value = true;
		elseif( $input === 1      ) $this->value = true;
		elseif( $input === true   ) $this->value = true;
		elseif( (string)$input == "false" ) $this->value = false;
		elseif( (string)$input == "no"    ) $this->value = false;
		elseif( (string)$input === "0"    ) $this->value = false;
		elseif( $input === 0      ) $this->value = false;
		elseif( $input === false  ) $this->value = false;
		else
			throw new Exception('Invalid boolean value');
	}
	
	public function __toString() {
		return ($this->value ? "true" : "false");
	}
	
	public function isTrue() {
		return $this->value;
	}

	public function getValue(){
		return $this->value;
	}
	
}

?>