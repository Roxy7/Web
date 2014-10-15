<?php
ob_start();
session_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

$email = HTMLSPECIALCHARS($_POST['email']);
$pseudo = HTMLSPECIALCHARS($_POST['pseudo']);
$uid = HTMLSPECIALCHARS($_POST['user_id']);
$cle = md5(microtime(TRUE)*100000);

$requete = "SELECT count(*) FROM membre WHERE membre_mail = :email";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':email'=>$email));
$resultat = $req_prep->fetchColumn();
if ($resultat == 0) // mail n existe pas, on peu creer
{
    
    $req_insertCtc="INSERT INTO membre (membre_mail,membre_pseudo,date_enregistrement,externe,cle) VALUES (:mail,:pseudo,now(),1,:cle)";
    $req_insertCtc_prep = $connect->prepare($req_insertCtc);
    $inser_exec = $req_insertCtc_prep->execute(array(':mail'=>$email,':pseudo'=>$pseudo,':cle'=>$cle));


    //recuperation du contact cré
    $req_Getnewextctc="select max(membre_id) as membre_id from membre";
    $req_Getnewextctc_prep = $connect->prepare($req_Getnewextctc);
    $inser_exec = $req_Getnewextctc_prep->execute();
    $donnees = $req_Getnewextctc_prep->fetch(PDO::FETCH_ASSOC);
    $newextctc=$donnees['membre_id'];


    $req_insertCtc="INSERT INTO contact (contact_user, contact_contact) VALUES (:userid,:contactid)";
    $req_insertCtc_prep = $connect->prepare($req_insertCtc);
    $inser_exec = $req_insertCtc_prep->execute(array(':userid'=>$uid,':contactid'=>$newextctc));
    
    $_SESSION['message'] = "Votre contact a bien été créé et ajouté a votre liste.";
    $_SESSION['message_type'] = 'success';
}
else
{
    $_SESSION['message']="L'adresse e-mail est déjà utilisée. Voici une recherche faite sur l'adresse mail renseignée :";
    $_SESSION['message_type']="alert";
    $_SESSION['externalexist']=$email;
    
}


header("Location: ../contact.php");
?>