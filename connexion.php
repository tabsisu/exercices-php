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
//Déclaration des constantes
//
const select_villes_ch = "
select ID, Name, CountryCode, District, Population 
from City 
where CountryCode = 'CHE'";

//
// Déclaration des variables
//
$error_msg = '';
$dbh = '';
$result = '';

//
//Connexion à la base de donnée
//
$dbh = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

    //
    //Gestion des erreurs lors de la connexion à la DB
    //

    if ($dbh->connect_errno) {
        $error_msg = $dbh->connect_errno . ' : ' . $dbh->connect_error;
    } else {
      if (!$result = $dbh->query(select_villes_ch)) {
          $error_msg = $dbh->errno . ' : ' . $dbh->error;
      }
    } 
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>tableau avec les villes suisses</title>
  </head>
  <body>
<?php

if ($error_msg){

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
