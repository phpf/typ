<?php
namespace phpram\typ;
abstract class DataType {
	
	protected $value;
	protected static $shortType = 's';
	
	public function __construct($value){
		$this->value = $value;
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public static function getShortType(){
		return static::$shortType;
	}
}
?>