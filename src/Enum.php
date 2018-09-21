<?php
namespace phpram\typ;

class Enum extends DataType {

	protected static $shortType = 's';
	protected $value;
	
	public function __construct( $value ){
		$refl = new \ReflectionClass(get_class($this));	
		
		if(in_array($value, $refl->getConstants())){
			$this->value = $value;
		}else{
			throw new \Exception("Invalid " . get_class($this));
		}
	}
	
	public function __toString(){
		return (string)$this->value;
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public function is($input){
		return $input == $this->value;
	}
	
	public static function getAll(){
		$a = array();
		$refl = new \ReflectionClass(get_called_class());
		$constants = $refl->getConstants();
		foreach($constants as $constant){
			$a[] = $refl->newInstance($constant);
		}
		return $a;
	}
	
}
?>