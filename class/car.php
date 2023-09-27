<?php
Class Car {
/** *Recuperer de tous las voitures de la table voiture
 * 
 * @return array
 */
public function getCar(){
    //recuperation de l'objet PDO de connexion
    global $oPDO;
    
$oPDOStatement = $oPDO->query("SELECT id, mark, model, year, color, price FROM car ORDER BY id ASC");

//recuperer du resultat dans un tableau ou' chaque ligne est un tableau associatif dont les cles sont les noms des champs

$cars= $oPDOStatement ->fetchAll(PDO::FETCH_ASSOC);
return $cars;

}

public function getCar($id){
    global $oPDO;
    //preparation de la requete
    $oPDOStatement = $oPDO->prepare("SELECT id, mark, model, year, color, price  FROM car WHERE id = :id");
    $oPDOStatement ->bindParam(':id', $id, PDO::PARAM_INT);            //le type peut etre aussi PARAM_STR au lieu de PARAM_INT

    //EXECUTION DE LA REQUETE PREPARER
 $oPDOStatement->execute (); 
 //recuperation de resultat
 $car= $oPDOStatement->fetch(PDO::FETCH_ASSOC);
 return $car;
}

public function ajouterCar($car){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("INSERT INTO car SET mark=:mark, model=:model, year=:year, color=:color, price=:price");
    $oPDOStatement ->bindParam(':mark', $car['mark'], PDO::PARAM_STR);
    $oPDOStatement ->bindParam(':model', $car['model'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':year', $car['year'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':color', $car['color'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':price', $car['price'], PDO::PARAM_DEC);
    $oPDOStatement->execute (); 
   
    if($oPDOStatement->rowCount() <= 0){return false;   //rowCount est une methode de PDO qui fonctionne apres la methode PREPARE et execute()
    }
    return $oPDO->lastInsertId();      //last InsertId() autre methode de PDO()
   }
    
public function updateCar($data){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("UPDATE car SET mark=:mark, model=:model, year=:year, color=:color, price=:price WHERE id =:id");
    $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':mark', $data['mark'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':model', $data['model'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':year', $data['year'], PDO::PARAM_INT);
    $oPDOStatement->bindParam(':color', $data['color'], PDO::PARAM_STR);
    $oPDOStatement->bindParam(':price', $data['price'], PDO::PARAM_DEC);
    $oPDOStatement->execute(); 
    
   
    $car= $oPDOStatement ->fetch(PDO::FETCH_ASSOC);
     $car;
}

public function delete($id){
    $car =$this->getCarById($id);
    if($car){
    global $oPDO;
    $oPDOStatement = $oPDO->prepare("DELETE FROM car WHERE id = :id");
    $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $oPDOStatement->execute(); 

    return "The car with id:  ".$car['id']." has been deleted";

    }else{
        return"Car not found";}
}
}

?>