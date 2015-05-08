<?php
/* ---------------------------------------------------------------------
* Test 1
* Nom du fichier: edit.php
* Auteur: Tabea Suter
* Date: Mars 2015
* Description:
* ---------------------------------------------------------------------
*/

//
// Protection du fichier pour qu'il ne puisse pas être téléchargé
//
require_once('connexion_dbh.php');

//Requête - afficher les données de la table City
$update_sql= "UPDATE City 
              SET District= ?, Population= ? 
              WHERE ID= ?";
$stmt = $dbh->perpare($update_sql);

// Variables
$id= (int) $_POST['ID'];
$population=$_POST['Population'];
$district=$_POST['District'];

$stmt->bind_param('sii', $id, $population, $district);

$result = $stmt->execute();


// Connexion à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//Vérification des erreurs
if ($mysqli->connect_errno) {
    die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
        $dbh->connect_error );
}

//Requête - afficher les données de la table City
$update_sql= "UPDATE City SET District='$district', 
              Population=$population WHERE ID=$id AND CountryCode='CHE'";

if (! $result = $mysqli->query($update_sql)) {
    //Gestion des erreurs - requêtes
    echo "Erreur: impossible d'exécuter la requête ($update_sql) : " . $mysqli->error;
    exit;
} else {
 

}

//Déconnexion
$mysqli->close();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>te1</title>
  </head>
  <body>
      
    <a href="cities.php">Revenir à la première page</a>
    
  </body>
</html>
