<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');
foreach ($_POST['usersAb'] as $selectedOption){
    $req_insertCtc="INSERT INTO abonnement (abonnement_membre, abonnement_vinnity) VALUES (:user,:viID)";
    $req_insertCtc_prep = $connect->prepare($req_insertCtc);
    $inser_exec = $req_insertCtc_prep->execute(array(':user'=>$selectedOption,':viID'=>$_POST['vinnity']));
}

header("Location: ../index.php");
?>