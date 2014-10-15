<?php
session_start();
ob_start();
header('Content-type: text/html; charset=UTF-8');

if (!isset($_POST['membre_wantMail'])){
    $_POST['membre_wantMail']=0;
}

if (isset($_POST['newpass']) and $_POST['newpass'] != ''){
    $changepass=1;
}

if(isset($_POST['user_id']) && $_POST['user_id'] != ''){

include('../param/bdd.php');

$login = htmlentities($_POST['login']);
$password = htmlentities($_POST['newpass']);
$email = htmlentities($_POST['email']);
$uid = htmlentities($_POST['user_id']);
$membre_wantMail = htmlentities($_POST['membre_wantMail']);



if($changepass==1){
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
}
else {
$requete_profil="UPDATE membre SET "
        . "membre_pseudo = :login "
        . ",membre_mail = :email "
        . ",membre_wantMail = :membre_wantMail "
        . ",date_modif = now() "
        . ",actif = 1 "
        . ",externe = 0 "
        . "WHERE membre_id = :uid ";

$requete_profil = $connect->prepare($requete_profil);
$inser_exec = $requete_profil->execute(array(
    ':login'=>$login,
    ':email'=>$email,
    ':membre_wantMail'=>$membre_wantMail,
    ':uid'=>$uid
       )); 
}


if ($inser_exec === true) 
                                {
    header("Location: /profil.php");
    }
    else {
        echo '<pre>', print_r($requete_profil->fetchAll(PDO::FETCH_ASSOC), TRUE), '</pre>';
    }


}


header("Location: /profil.php");

?>