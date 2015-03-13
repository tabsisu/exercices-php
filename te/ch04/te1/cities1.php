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
// Constantes
//
// Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';
// Variables
//
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>te1</title>
  </head>
  <body>
<?php
// on se connecte à la base de données
      $dbh = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
      if ($dbh->connect_errno) {
          die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
                                                           $dbh->connect_error );

//echo "Problème de connexion à la base de données".$dbh->connect_errno $dbh->connect_error.";
      
}
echo "OK {$dbh->host_info}" ;
$dbh-> close ();
         echo "<h2>Voici le contenu de la table City</h2>";
      $sql = 'SELECT selected_ID FROM City';
      if ($result = $dbh->query($sql)) {
          $nbr = $result->num_rows;
          echo "Il y a $nbr d'enregistrements";
}
//Afficher les données du tableau City
          while ($row = $dbh->fetch_assoc()) { ?>
            <table>
              <tr>
                <td> <?= $row['selected_ID']?>
                <td> <?= $row['Name']?>
                <td> <?= $row['District']?>
                <td> <?= $row['Population']?>
                <td><form method="post" action="edit.php">
                    <a input type="submit" value="Envoyer" /></a>
                    <a input type="submit" value="Annuler" /></a>
                    </form>
                <td><a href="edit.php">Modifier</a>
<?php
}
?>
             </tr>
           </table>
</body>
</html>
