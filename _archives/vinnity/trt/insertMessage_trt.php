<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

$vinnityID = htmlspecialchars($_POST['vinnity']);
$msg = htmlspecialchars($_POST['msg']);
$userID = htmlspecialchars($_POST['user_id']);

$requete_newMsg="INSERT INTO  message (message_txt ,message_user ,message_vinnity)VALUES (:msg, :user, :vinnity)";

$requete_newMsg_prep = $connect->prepare($requete_newMsg);
$inser_exec = $requete_newMsg_prep->execute(array(':msg'=>$msg,':user'=>$userID,':vinnity'=>$vinnityID));


$req_GetVinityInfo="select max(membre_wantMail) as mail from abonnement "
        . "inner join membre on membre.membre_id = abonnement.abonnement_membre "
        . "where abonnement.abonnement_vinnity = :vinnity";
$req_GetVinityInfo_prep = $connect->prepare($req_GetVinityInfo);
$inser_exec = $req_GetVinityInfo_prep->execute(array(':vinnity'=>$vinnityID));
$donnees = $req_GetVinityInfo_prep->fetch(); 
if($donnees['mail']==1){
    include('sendVinnityMail_trt.php');
}

header("Location: ../index.php");

?>
