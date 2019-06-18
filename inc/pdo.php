<?php 

   //enty hot root o mdp khaliha fergha 
   $username='aminelch';
   $password = 'demo'; 


try {
        $pdo = new PDO('mysql:host=localhost;dbname=efficience_002', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   	}
	 catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

