<!DOCTYPE html>
<?php
/* ---------------------------------------------------------------------
* Test 6
* Nom du fichier: traitement.php
* Auteur: Tabea Suter
* ---------------------------------------------------------------------
*/
// Constantes
//Pour se connecter à la base de données
const DB_SERVER = 'localhost';
const DB_USER = 'cpnv';
const DB_PWD = 'cpnv1234';
const DB_NAME = 'world';

//Déclaration des variables

$sexe='';
$nom='';
$courriel='';

// Connexion à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

//Vérification des erreurs
if ($mysqli->connect_errno) {
    die("Problème de connexion à la base de donnée({$dbh->connect_errno})".
                                                    $dbh->connect_error );
}

$sexe=$_POST['sexe'];
$nom=$_POST['nom'];
$courriel=$_POST['courriel'];

if(!filter_var($courriel, FILTER_VALIDATE_EMAIL)){
    echo "Votre adresse mail n'est pas valide <br> <br>";
  
}

if(!empty($sexe))
{
    
 if ($sexe=="f"){
    echo "Bienvenue Mme. $nom, votre adresse courriel est: $courriel";
} else {
echo "Bienvenue M. $nom, votre adresse courriel est: $courriel";
} 

   
}
else
{
     echo "Veuillez noter si vous êtes une femme ou un homme <br><br>";
     ?><a href="exercice.php">Revenir à la page pour remplir les champs</a> 
<?php
}
?>
