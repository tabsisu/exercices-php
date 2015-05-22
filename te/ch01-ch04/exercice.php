<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 6
* Nom du fichier: exercice.php
* Auteur: Tabea Suter
* ---------------------------------------------------------------------
*/
// Constantes
//Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';

// Connexion à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//Vérification des erreurs
if ($mysqli->connect_errno) {
    die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
                                                    $dbh->connect_error );
}

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>te1</title>
  </head>
  <body>
      
<form action='traitement.php' method='post'>
      <p>
          Sexe:
          <label><input type="radio" name="sexe" value="m">M</label>
          <label><input type="radio" name="sexe" value="f">F</label>

      </p>
      
      <p>
        <label>
        Nom:
        <input name="nom" type="text"  maxlength="55" minlength="55">
        </label>
      </p>

      <p>
        <label>
        Courriel:
        <input name="courriel" type="text">
        </label>
      </p>
      
      <p>
        <label>
        <input name="Envoyer" type="submit" value="Envoyer">
        </label>
      </p>
    </form>
    </body>
</html>
