<?php

/**
 * Randomize for generating a random strings and arrays  
 *
 * This code was written by Amine L'ch
 * <aminelch95@gmail.com>, and is used/adapted with his permission.
 ***************************************************************************************
 * Copyright 2017  Amine L'ch <aminelch95@gmail.com> (https://aminelch.github.io/)
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @package Text_Diff
 * @author   Amine L'ch
 ***************************************************************************************/

class Randomize {
   /**
    * [randomString generate a random string ]
    * @param  integer $length       [string length]
    * @param  boolean $useSymbole   [use extra chars ]
    * @param  boolean $useUpperCase [use UpperCase letter]
    * @return [string]                
    */
   
   static public function randomString($length=10,$useSymbole=false,$useUpperCase=true) {

   	$pattern='abcdefghijklmnopqrstuvwxyz';
   	$upper="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   	$symb="#{[|`\^@]}-_*/!,;";
   	if($useSymbole):
   		$pattern.=$symb;
   	endif;
   	if($useUpperCase):
   		$pattern.=$upper;
   	endif; 
   	return substr(str_shuffle($pattern),0,$length);
   }

   
   /**
    * [randomArray generate a random array ]
    * @param  integer $length       [array length]
    * @param  boolean $type   [type of generated array numbers or float ]
    * @return [array]                
    */
   

   static public function randomArray($length=4,$type='numbers'){
   	switch ($type) {
   		case 'numbers':
   		$arr_entry = range(1, $length, rand(1,5));
   		break;
   		case 'float':
   		$arr_entry = range(1.05, $length);
   		break;
   	}

   	$random=[];
   	
   	shuffle($arr_entry);
	// foreach ($arr_entry as $entry) {
 	//    $random .= $entry;
	// }
   	for ($i=0; $i <count($arr_entry) ; $i++) { 
   		$random[$i]= $arr_entry[$i];
   	}
   	return $random;

   }


}