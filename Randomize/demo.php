<?php
 
//includes and evaluates the specified file.
require 'Randomize.php';

//Generate a array of 5 index
var_dump(Randomize::randomArray(5,'numbers'));

//Generate a string of 20 chars  without using symbol or UpperCase letter 

var_dump(Randomize::randomString(20,false,false));

//Generate a string of 8 chars   using symbol and UpperCase letter 

var_dump(Randomize::randomString(20,true, true));