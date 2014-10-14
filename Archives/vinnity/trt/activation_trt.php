<?php
ob_start();
session_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

if(isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != '' && $_POST['password'] != ''){
$login = htmlentities($_POST['login']);
$password = htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);
$uid = htmlentities($_POST['user_id']);
$cle = htmlentities($_POST['cle']);

if(isset($_POST['membre_wantMail']) && $_POST['membre_wantMail']==1){
    $membre_wantMail = htmlentities($_POST['membre_wantMail']);
} else {
    $membre_wantMail = 0;
}



$requete_profil="UPDATE membre SET "
        . "membre_pseudo = :login "
        . ",pass = :password "
        . ",membre_mail = :email "
        . ",membre_wantMail = :membre_wantMail "
        . ",date_modif = now() "
        . ",actif = 1 "
        . ",externe = 0 "
        . "WHERE membre_id = :uid ";
$requete_profil = $connect->prepare($requete_profil);
$inser_exec = $requete_profil->execute(array(
    ':login'=>$login,
    ':password'=>password_hash($password, PASSWORD_DEFAULT),
    ':email'=>$email,
    ':membre_wantMail'=>$membre_wantMail,
    ':uid'=>$uid
       ));


        setcookie('cle', $cle, time() + 24*3600, '/', null, false, true);
        setcookie('isConnected', 1, time() + 24*3600, '/', null, false, true);
        $requete_log = "insert into cnx_log (cnx_log_pseudo,cnx_log_act) values (:membre,1)";
        $requete_log = $connect->prepare($requete_log);
        $requete_log->execute(array(':membre'=>$uid));

header("Location: /index.php");
} else {
    $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
    $message_type = 'danger';
    $_SESSION['message']=$message;
    $_SESSION['message_type']=$message_type;

    header("Location: ".$_POST['uri']);
}


?>