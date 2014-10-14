<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

// creation de la vinnity
$req_insVinnity="INSERT INTO vinnity (vinnity_nom) VALUES (:viNom)";
$req_insVinnity_prep = $connect->prepare($req_insVinnity);
$inser_exec = $req_insVinnity_prep->execute(array(':viNom'=>$_POST['Titre']));


//recuperation de l'id de la vinnity
$req_GetViID="select max(vinnity_id) as viID from vinnity";
$req_GetViID_prep = $connect->prepare($req_GetViID);
$inser_exec = $req_GetViID_prep->execute();
$donnees = $req_GetViID_prep->fetch(PDO::FETCH_ASSOC);
$viID=$donnees['viID'];

//insertion de l'abonnement du createur
$req_insertCtc="INSERT INTO abonnement (abonnement_membre, abonnement_vinnity) VALUES (:user,:viID)";
$req_insertCtc_prep = $connect->prepare($req_insertCtc);
$inser_exec = $req_insertCtc_prep->execute(array(':user'=>$_POST['user_id'],':viID'=>$viID));

//insertion des abonnements de tous les contacts choisi
foreach ($_POST['users'] as $selectedOption){
    $req_insertCtc="INSERT INTO abonnement (abonnement_membre, abonnement_vinnity) VALUES (:user,:viID)";
    $req_insertCtc_prep = $connect->prepare($req_insertCtc);
    $inser_exec = $req_insertCtc_prep->execute(array(':user'=>$selectedOption,':viID'=>$viID));
}



header("Location: ../index.php");
?>