DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 1
* Nom du fichier: edit.php
* Auteur: Tabea Suter
* Date: Mars 2015
* Description: 
* ---------------------------------------------------------------------
*/
// Constantes
//
// Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';
// Variables
//
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>te1</title>
</head>
<body>
<?php
// on se connecte à la base de données

$dbh = @new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
if ($dbh->connect_errno) {
    die ("Problème de connexion à la base de donnée ({$dbh->connect_errno})".
                                                    $dbh->connect_error;
}
exit();
}
echo "<h2>Voici le contenu de la table City</h2>";
while ($row = $dbh->fetch_assoc()) {
    <td> <?echo $row['selected_ID']?>
        <td> <?echo $row['Name']?>
        <td> <?echo $row['District']?>
        <td> <?echo $row['Population']?>
        <td> <?<a href="edit.php">Mettre à jour</a>?>
</html>
