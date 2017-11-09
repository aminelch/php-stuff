<?php 
//L'IP de l'utilisateur courant
  $User_ip=$_SERVER['REMOTE_ADDR'];
//le chemin de fichier 
$target_file='ip_list.txt';

if(file_exists($target_file)) : 
	$ip_list = file($target_file);
	
	else:
	throw new Exception("Filename does not exist");
endif;
	
if(in_array($User_ip,$Authorized_ip)):

	//Traitement ici !! 




else :
	// On bloque l'excution de script 
	exit();

endif; 
