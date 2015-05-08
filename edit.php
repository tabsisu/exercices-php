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

// Constantes
$ID = (int) $_GET['ID'];


// Connexion à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//Vérification des erreurs
if ($mysqli->connect_errno) {
    die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
                                                    $dbh->connect_error );
}


//Requête - afficher les données de la table City
$query = "SELECT ID, Name, CountryCode, District, Population FROM City 
          WHERE ID= $ID AND CountryCode='CHE'";

if (! $result = $mysqli->query($query)) {
    //Gestion des erreurs - requêtes
    echo "Erreur: impossible d'exécuter la requête ($query) : " . mysqli_error();
    exit;
} else {
    
    // Créer la boucle
    $row = $result->fetch_assoc();
    
    //Et afficher les données sous forme de formulaire
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>te1</title>
  </head>
  <body>
      
    <h2>Vous pouvez maintenant modifier les données.</h2>
    
    <form action='update.php' method='post'>
      <p>
        <label>
          ID 
          <input name="ID" type="text" value="<?= $row['ID']?>" readonly>
        </label>
      </p>
      
      <p>
        <label>
        Name 
        <input name="Name" type="text" value="<?= $row['Name']?>" maxlength="35">
        </label>
      </p>
      
      <p>
        <label>
        CountryCode 
        <input name="CountryCode" type="text" value="<?= $row['CountryCode']?>" readonly>
        </label>
      </p>
      
      <p>
        <label>
        District
        <input name="District" type="text" value="<?= $row['District']?>" maxlength="20">
        </label>
      </p>
      
      <p>
        <label>
        Population
        <input name="Population" type="number" min="0" max="99999999999" value="<?= $row['Population']?>">
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
