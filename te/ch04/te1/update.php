<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 1
* Nom du fichier: edit.php
* Auteur: Tabea Suter
* Date: Mars 2015
* Description:
* ---------------------------------------------------------------------
*/
// VAriables
$id=$_POST['ID'];
$population=$_POST['Population'];
$district=$_POST['District'];

//Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';

?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>te1</title>
  </head>
  <body>
      
<?php 

// Connexion à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//Vérification des erreurs
if ($mysqli->connect_errno) {
    die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
        $dbh->connect_error );
}

//Requête - afficher les données de la table City
$update_sql= "UPDATE City SET District=$district, Population=$population WHERE ID=$id";

if (! $result = $mysqli->query($update_sql)) {
    //Gestion des erreurs - requêtes
    echo "Erreur: impossible d'exécuter la requête ($update_sql) : " . $mysqli->error;
    exit;
} else {




$result->free();
}

//Déconnexion
$mysqli->close();

?>
    <a href="cities.php">Revenir à la page précédente</a>
  </body>
</html>
