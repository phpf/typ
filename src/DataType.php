<?php
namespace typ;
abstract class DataType {
	
	protected static $shortType = 's';
	
	public function __construct(){
		
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public static function getShortType(){
		return static::$shortType;
	}
}
?>