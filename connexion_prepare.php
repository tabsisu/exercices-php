<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 1
* Nom du fichier: connexion.php
* Auteur: Tabea Suter
* Date: Mai 2015
* Description:
* ---------------------------------------------------------------------
*/

//
// Protection du fichier pour qu'il ne puisse pas être téléchargé
//
require_once('connexion_dbh.php');

//
// Déclaration des variables
//
$error_msg = '';
$dbh = '';
$result = '';

//
//Connexion à la base de donnée
//
$dbh = @ new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//
//Gestion d'erreurs lors de la connexion à la DB
//
if ($dbh->connect_errno) {
    $error_msg = $dbh->connect_errno . ' : ' . $dbh->connect_error;
}

//
//Requêtes préparées
//

    //    
    // Requête préparée, étape 1 : la préparation
    //
    $insert_query = 'SELECT FROM City (ID, Name, CountryCode, District, Population) VALUES(?, ?, ?, ?, ?)';
    if (!($result = $dbh->prepare($insert_query))) {
    $error_msg = $dbh->errno . ' : ' . $dbh->error;
    } else {
    
        //
        // Requête préparée, étape 2 : lie les valeurs et exécute la requête
        //
        if (!$result->execute()) {
        $error_msg = $insert_query->errno . ' : ' . $insert_query->error;
        }
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Require_once</title>
  </head>
  <body>
<?php
if (!$error_msg){
    echo "Problème avec la db:". $error_msg;
} else {
?>
      <table>
        <tr>
          <td> <b>ID </b></td>
          <td> <b>Name </b></td>
          <td> <b>CountryCode </b></td>
          <td> <b>District </b></td>
         <td> <b>Option </b></td>
        </tr>


<?php
    while ($row = $result->fetch_assoc()) {
?>
       <tr>
         <td> <?= $row['ID']?>
         <td> <?= $row['Name']?>
         <td> <?= $row['CountryCode']?>
         <td> <?= $row['District']?>
        <td><a href="edit.php?ID=<?= $row['ID']?>">Modifier</a>
       </tr>
<?php
}
?>

    </table>
<?php
} 
$dbh ->close();
?>
  </body>
</html>
