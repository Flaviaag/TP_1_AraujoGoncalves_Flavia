<?php
$host="localhost";
$db="tp1voiture";
$user="root";
$password="";

$dsn="mysql: host=$host; dbname=$db; charset=UTF8";

global $oPDO;
try{
    
    $oPDO= new PDO($dsn, $user, $password);
    if($oPDO){
        echo"Connected to the $db database successfuly";
    }
   
}catch (PDOException $e){echo$e->getMessage();
}

require_once "./Class/voiture.php";

$ovoiture =new Voiture;
echo"<br />";

$voiture= $ovoiture->getVoitureById(1);
echo"<br />";

$ovoiture["marque"]="Toyota";
$voiture["annee"] = 2023;

// var_dump($voitures);
$result = $ovoiture->update($voiture["id"], $voiture);
var_dump($result);


// POUR AJOUTER IL FALAIT UN TABLEAU 
$ovoiture_to_insert=['marque'=>'Toyota',
                'modele'=>'Corolla',
                'annee'=>'2023',
                'couleur'=>'gris',
                'prix'=>'25000',
            ];
 $voiture_add = $ovoiture ->ajouterVoiture($ovoiture_to_insert);

$voiture=$ovoiture->getVoiture(1);
echo"<br />";

$voiture['marque']="Toyota";
$voiture['annee']=2023;


$resultat=$ovoiture->updateVoiture($voiture);

$resultat=$ovoiture->delete(3);
var_dump($resultat);

?>