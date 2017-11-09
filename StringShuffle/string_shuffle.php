<?php
/**
 * [randomString given a random string]
 * @author Amine Karismatik
 * @param  boolean $symbol [use symbols char]
 * @param  boolean $maj    [user Uppercase Alphabet]
 * @return [type]          [string that contain the shuffled string]
 */
function randomString($symbol=true,$maj=true){
	$a_pattern='abcdefghijklmnopqrstuvwxyz';
	$a_maj="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$a_symb="#{[|``\^@]}-_*/!,;";
	if(isset($symbol) && is_bool($symbol)):
		$a_pattern.=$a_symb;
	endif;
	if(isset($maj) && is_bool($maj)):
		$a_pattern.=$a_maj;
	endif;
	return str_shuffle($a_pattern); 
	//return str_shuffle($str);
}
function randomStringFromString($str){
	return str_shuffle($str);
}
// $strr=randomString(false,false);
$strr=randomStringFromString("HDHfkdf_88dsd");
var_dump($strr);
?> 