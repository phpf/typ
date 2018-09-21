<?php
namespace phpram\typ;
class Stringy extends DataType {

	protected $value;
	
	function __construct( $str ){
		$this->value = strval($str);
	}

	function getLength(){
		return mb_strlen($this->value);
	}

	public function __toString() {
		return (string)($this->value);
	}
	
	public function toLower(){
		return new self(strtolower($this->value));
	}

	public function replace($search, $replace){
		return new self(str_replace($search, $replace, $this->value));
	}
	
	/**
	 * 
	 * @param mixed $pattern
	 * @param mixed $replacement
	 * @param mixed $limit
	 * @return Stringy
	 */
	public function regexReplace($pattern, $replacement, $limit=-1){
		return new self(preg_replace($pattern, $replacement, $this->value, $limit));
	}
	
	public function escapeLineBreaks(){
		$text = $this->value;
		$text = str_replace("\r\n","\\n",$text);
		$text = str_replace("\n","\\n",$text);
		return new self($text);	
	}
	
	public function escapeBackslash(){
		$text = $this->value;
		$text = str_replace("\\","\\\\",$text);
		return new self($text);	
	}
	
	public function escapeJson($doubleQuoted=true){
		$text = $this->value;
		$text = str_replace('\\','\\\\', $text);
		$text = str_replace("\n",'\n', $text);
		$text = str_replace("\r",'\r', $text);
		$text = str_replace("\t",'\t', $text);
		$text = str_replace("\v",'\v', $text);
		$text = str_replace("\f",'\f', $text);
		$text = str_replace("\b",'\b', $text);
		if($doubleQuoted){
			$text = str_replace('"','\"', $text);
		}else{
			$text = str_replace("'","\'", $text);
		}
		return new self($text);
	}
	
	public function equals(Stringy $anotherString, $caseSensitive=true){
		if($caseSensitive){
			return $this->__toString() == $anotherString->__toString();
		}else{
			return strtolower($this->__toString()) == strtolower($anotherString->__toString());
		}
	}
	
	public function contains(Stringy $substr, $caseSensitive=true){
		if($caseSensitive){
			return strpos($this->value, $substr->__toString()) !== false;
		}else{
			return strpos(strtolower($this->value), strtolower($substr->__toString())) !== false;
		}
	}
	
	public function truncate($maxLength, $ending='...'){
		if(mb_strlen($this->value)>$maxLength){
			$newStr = mb_substr($this->value, 0, $maxLength - mb_strlen($ending),'utf-8');
			$newStr .= $ending;
			return new self($newStr);
		}else{
			return $this;
		}
	}
	
	public function trim($characterMask = " \t\n\r\0\x0B"){
		$str = $this->value;
		$str = trim($str, $characterMask);
		return new self($str);
	}
	
	public static function random($length = 32, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'){
		$charsLength = (strlen($chars) - 1);
		$string = '';
		for ($i = 0; $i < $length; $i++){
			$string .=  $chars[mt_rand(0, $charsLength)];
		}
		return new self($string);
	}
	
}
?>