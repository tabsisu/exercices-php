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
// Constantes
//Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';

$ID = (int) $_GET['ID'];
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

//Requête - afficher les données de la table City
$query = "SELECT ID, Name, CountryCode, District, Population FROM City WHERE ID= $ID";

if (! $result = $mysqli->query($query)) {
    //Gestion des erreurs - requêtes
    echo "Erreur: impossible d'exécuter la requête ($query) : " . mysqli_error();
    exit;
} else {
    
    // Créer la boucle
    $row = $result->fetch_assoc();
    
    //Et afficher les données sous forme de formulaire
?>
    <h2>Vous pouvez maintenant modifier les données.</h2>
    
    <form action='update.php' method='post'>
      <p>
        <label>
          ID 
          <input name="ID" type="text" value="<?= $row['ID']?>">
        </label>
      </p>
      
      <p>
        <label>
        Name 
        <input name="Name" type="text" value="<?= $row['Name']?>">
        </label>
      </p>
      
      <p>
        <label>
        CountryCode 
        <input name="CountryCode" type="text" value="<?= $row['CountryCode']?>">
        </label>
      </p>
      
      <p>
        <label>
        District
        <input name="District" type="text" value="<?= $row['District']?>">
        </label>
      </p>
      
      <p>
        <label>
        Population
        <input name="Population" type="text" value="<?= $row['Population']?>">
        </label>
      </p>
      
      <p>
        <label>
        <input name="Enregistrer" type="submit" value="Enregistrer">
        </label>
      </p>
    </form>

<?php
    $result->free();
}

//Déconnexion
$mysqli->close();
?>
<a href="cities.php">Revenir à la page précédente</a>
</body>
</html>
