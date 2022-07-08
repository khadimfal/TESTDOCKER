<?php

$host = 'localhost';
$dbname = 'compta';
$username = 'root';
$password = '';

if(isset($_POST['insert'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }

  // récupérer les valeurs 
  $id = $_POST['id'];
  $date = $_POST['date'];
  $adherent = $_POST['adherent'];
  $montant = $_POST['montant'];
  $commentaire = $_POST['commentaire'];

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `adhesion`(`id`, `date`, `adherent`, `montant`, `commentaire` ) VALUES (:id,:date,:adherent,:montant,:commentaire)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":id"=>$id,":date"=>$date,":adherent"=>$adherent,":montant"=>$montant,":commentaire"=>$commentaire));

  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Données insérées';
  }else{
    echo "Échec de l'opération d'insertion";
  }
}
?>