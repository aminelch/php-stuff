<?php

function islogged()
{
    if (!(isset($_SESSION['user']))) {
        setFlash('danger','Vous devez connecté !!');
        header('Location: login.php');
        die();
    }
}


function getLastNotifications()
{
    global $pdo;


    $sql = "SELECT * FROM notification ORDER BY id_notif DESC limit 3";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll();
}

function getAllNotifications()
{
    global $pdo;


    $sql = "SELECT * FROM notification ORDER BY id_notif DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll();
}

function getUsers($type = 'admin')
{
    global $pdo;
    $sql = '';

    if ($type == 'admin') {
        $sql = "SELECT * FROM admin ORDER BY matricule DESC";
    } elseif ($type == 'supervisor') {
        $sql = "SELECT * FROM superviseur ORDER BY matricule DESC";
    } elseif ($type == 'lineleader') {
        $sql = "SELECT * FROM chef_ligne ORDER BY matricule DESC";
    } else {

        $sql = "SELECT * FROM admin ORDER BY matricule DESC";
    }


    $sth = $pdo->prepare($sql);
    $sth->execute();


    $result = $sth->fetchAll();
    return $result;
}

function deleteAdmin($matricule){
    global $pdo;
    
    $sql = "DELETE FROM admin WHERE matricule =  :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':matricule', $matricule, PDO::PARAM_INT);
    $stmt->execute();
    $_GET = [];
    $_SESSION['flash']['message'] = 'Suppression avec succées';
    $_SESSION['flash']['type'] = 'success';


}

function deleteSuperVisor($matricule){
    global $pdo;
    
    $sql = "DELETE FROM superviseur WHERE matricule =  :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':matricule', $matricule, PDO::PARAM_INT);
    $stmt->execute();
    $_GET = [];
    $_SESSION['flash']['message'] = 'Suppression avec succées';
    $_SESSION['flash']['type'] = 'success';


}

function deleteLineLeader($matricule){
    global $pdo;
    
    $sql = "DELETE FROM chef_ligne WHERE matricule =  :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':matricule', $matricule, PDO::PARAM_INT);
    $stmt->execute();
    $_GET = [];
    $_SESSION['flash']['message'] = 'Suppression avec succées';
    $_SESSION['flash']['type'] = 'success';


}


function getNumLignes()
{
    global $pdo;


    $sql = "SELECT * FROM ligne";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll();
}


function addAdmin ($matricule, $nom, $prenom, $password){
    global $pdo;
    $sql = "INSERT INTO admin (matricule, nom, prenom, pwd) VALUES (?,?,?,?)";
    $pdo->prepare($sql)->execute([$matricule, $nom, $prenom, $password]);
}

function addSuperVisor ($matricule, $nom, $prenom, $password){
    global $pdo;
    $sql = "INSERT INTO superviseur (matricule, nom, prenom, pwd) VALUES (?,?,?,?)";
    $pdo->prepare($sql)->execute([$matricule, $nom, $prenom, $password]);
}

function addLineLeader ($matricule, $nom, $prenom, $nom_ligne,$pwd){
    global $pdo;
    $sql = "INSERT INTO chef_ligne (matricule, nom, prenom, nom_ligne, pwd) VALUES (?,?,?,?,?)";
    $pdo->prepare($sql)->execute([$matricule, $nom, $prenom, $nom_ligne,$pwd]);
}

function deleteNotification($id){
    global $pdo;

$sql = "DELETE FROM notification WHERE id_notif =  :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);   
$stmt->execute();

    $_GET = [];


}

function addObjectif($objectif , $val){
    global $pdo;
    $sql = "INSERT INTO objectif (objectif,nom_ligne,created_at) VALUES (?,?,CURRENT_TIMESTAMP)";
    $pdo->prepare($sql)->execute([$objectif,$val]);

}

function getLignes()
{
    global $pdo;


    $sql = "SELECT * FROM ligne";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll();
}
function getEfficience()
{
    global $pdo;


    $sql = "SELECT * FROM efficience";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll();
}

function setFlash($type='info', $message=''){
    $_SESSION['flash']['type'] = $type;
    $_SESSION['flash']['message'] = $message;
}
function getFlash(){
    if(!empty($_SESSION['flash'])){
        $flash= "<div class=\"alert alert-{$_SESSION['flash']['type']} alert-dismissible fade show\" role=\"alert\">
        {$_SESSION['flash']['message']}
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>"; 
      echo $flash ; 
    //  unset($_SESSION['flash']); 
    
    }else{
        return null ; 
    }
}

function dd(&$var){
    echo "<div class='row'><div class='col-md-6'><pre>";
            print_r($var);    
            echo "</pre></div></div>"; 
}