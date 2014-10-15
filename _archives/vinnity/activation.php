<?php
session_start();
include('param/bdd.php');
//...
// Votre code
//...
// Connexion à la base de données
//...
 
 
// Récupération des variables nécessaires à l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];
 
// Récupération de la clé correspondant au $login dans la base de données
$stmt = $connect->prepare("SELECT cle,actif,membre_mail,membre_id FROM membre WHERE membre_pseudo like :login ");
if($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch())
  {
    $clebdd = $row['cle'];	// Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
    $email = $row['membre_mail'];
    $user_ID = $row['membre_id'];
  }
 
 
// On teste la valeur de la variable $actif récupéré dans la BDD
if($actif == '1') // Si le compte est déjà actif on prévient
  {
     $message =  "Votre compte est déjà actif !";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $clebdd) // On compare nos deux clés	
       {
         include('include/activationpage.php');
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          $message =  "Erreur ! Votre compte ne peut être activé...";
       }
  }
 
 ?>