<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 1
* Nom du fichier: cities.php
* Auteur: Tabea Suter
* Date: Mars 2015
* Description:
* ---------------------------------------------------------------------
*/
// Constantes -pour se connecter à la base de données
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

echo "BRAVO, la connexion s'est bien passée!";

// Requête - afficher le nbr de villes suisses
if ($result = $mysqli->query("SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name")){
    $nbr = $result->num_rows;
    printf("J'ai trouvé y %d villes suisses.\n", $nbr);
    $result->close();
}

//Tableau avec les données
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

//Requête - afficher les données de la table City
$query = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name";
if ($result = $mysqli->query($query)) {
    
//Gestion des erreurs - requêtes
if (!$result) {
    echo "Erreur: impossible d'exécuter la requête ($query) : " . mysqli_error();
    exit;
}

// Créer la boucle pour afficher les villes suisses
while ($row = $result->fetch_assoc()) {
    
//Et afficher les données sous forme de tableau
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

$result->free();
}

//Déconnexion
$mysqli->close();
?>
    </table>
  </body>
</html>
