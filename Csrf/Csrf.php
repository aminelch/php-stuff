<?php 

class  Csrf {
/**
 * [RandomToken generate a unique token]
 * @param integer $length 
 */
private static function RandomToken($length = 8){
	if (function_exists('random_bytes')) {
		return bin2hex(random_bytes($length));
	}
	if (function_exists('mcrypt_create_iv')) {
		return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
	} 
	if (function_exists('openssl_random_pseudo_bytes')) {
		return bin2hex(openssl_random_pseudo_bytes($length));
	}
}

/**
 * [generate return a generate token]
 * @param  integer $length [leght of token]
 * @return [mixed]          [string]
 */
public static function generate($length=8){
	if(isset($_SESSION['Csrf'])&& !empty($_SESSION['Csrf'])){
		$token=  $_SESSION['Csrf'];
	}else{
		
		$token= Csrf::RandomToken($length);
	}
	 

	$_SESSION['Csrf']= $token;
}


/**
 * [check if the token if equal of the testing value 
 * @param  [string] $testvalue 
 * @return [bool]  
 */
public static function check($testvalue) {
	if( self::getCsrf()==NULL || self::getCsrf() != $testvalue){
		return false; 
	}	
	return true; 

 // var_dump(self::getCsrf());
}

public static function str_random ($length){
	$alphabet="azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	return substr(str_shuffle(str_repeat($alphabet, $length)),0,$length);

}

/**
 * Return the stored Csrf on the session Or NULL
 * @return [string] [the data]
 */

public static function getCsrf(){
	if (isset($_SESSION['Csrf'])) {
		return $_SESSION['Csrf'];
	}
	
	return null; 

}



/**
 * Destroy the Csrf key from Session
 * @return [NULL] [no return type]
 */
public static function unsetCsrf(){
	unset($_SESSION['Csrf']);
}


}