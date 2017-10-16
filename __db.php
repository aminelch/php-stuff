<?php 
define('DB_USER','root');
define('DB_PASS','dbpass');	
define('DB_NAME','dbname');
try{
	$db=new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USER,DB_PASS);
	
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	$db->exec("SET CHARACTER SET utf8");
}catch(Exception $e){
	echo 'Database not found';
	echo '<b>'.$e->getMessage().'</b>';
	die();
}
