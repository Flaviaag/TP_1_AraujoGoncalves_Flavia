<?php
Class Voiture extends Vehicule {
/** *Recuperer de tous las voitures de la table voiture
 * 
 * @return array
 */
public function getVoiture(){
    //recuperation de l'objet PDO de connexion
    global $oPDO;
    
$oPDOStatement = $oPDO->query("SELECT id, marque, modele, annee, couleur, prix FROM voiture ORDER BY id ASC");

//recuperer du resultat dans un tableau ou' chaque ligne est un tableau associatif dont les cles sont les noms des champs

$voitures= $oPDOStatement ->fetchAll(PDO::FETCH_ASSOC);
return $voitures;

}

public function getVoiture($id){
    global $oPDO;
    //preparation de la requete
    $oPDOStatement = $oPDO->prepare("SELECT id, marque, modele, annee, couleur, prix FROM voiture WHERE id = :id");
    $oPDOStatement ->bindParam(':id', $id, PDO::PARAM_INT);            //le type peut etre aussi PARAM_STR au lieu de PARAM_INT

    //EXECUTION DE LA REQUETE PREPARER
 $oPDOStatement->execute (); 
 //recuperation de resultat
 $voiture= $oPDOStatement->fetch(PDO::FETCH_ASSOC);
 return $voiture;
}

public function ajouterVoiture($voiture){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("INSERT INTO voiture SET marque=:marque, modele=:modele, annee=:annee, couleur=:couleur, prix=:prix");
    $oPDOStatement ->bindParam(':marque', $voiture['marque'], PDO::PARAM_STR);
    $oPDOStatement ->bindParam(':modele', $voiture['modele'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':annee', $voiture['annee'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':couleur', $voiture['couleur'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':prix', $voiture['prix'], PDO::PARAM_DEC);
    $oPDOStatement->execute (); 
   
    if($oPDOStatement->rowCount() <= 0){return false;   //rowCount est une methode de PDO qui fonctionne apres la methode PREPARE et execute()
    }
    return $oPDO->lastInsertId();      //last InsertId() autre methode de PDO()
   }
    
public function updateVoiture($data){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("UPDATE voiture SET marque=:marque, modele=:modele, annee=:annee, couleur=:couleur, prix=:prix WHERE id =:id");
    $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':marque', $data['marque'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':modele', $data['modele'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':annee', $data['annee'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':couleur', $data['couleur'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':prix', $data['prix'], PDO::PARAM_DEC);
    $oPDOStatement->execute(); 
    
   
    $voiture= $oPDOStatement ->fetch(PDO::FETCH_ASSOC);
     $voiture;
}

public function delete($id){
    $voiture =$this->getVoitureById($id);
    if($voiture){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("DELETE FROM voiture WHERE id = :id");
    $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $oPDOStatement->execute(); 

    return "La voiture avec id:  ".$voiture['id']." a ete suprimer";

    }else{
        return"Voiture introuvable";}
}
}

?>