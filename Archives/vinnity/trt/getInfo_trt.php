<?php
ob_start();
    $requete_info = "select * from membre "
            . "where cle = :cle";
    $requete_info = $connect->prepare($requete_info);
    $requete_info->execute(array(':cle'=>htmlentities($_COOKIE['cle'])));
    $userdata=$requete_info->fetch();
    
    
    
$user_ID = $userdata['membre_id'];
$user_pseudo = $userdata['membre_pseudo'];
$user_mail = $userdata['membre_mail'];
$membre_wantMail = $userdata['membre_wantMail'];



    $requete_info = "select max(lastvisit_dt) as lastvisit_dt from lastvisit "
            . "where lastvisit_membre=:userid";
    $requete_info = $connect->prepare($requete_info);
    $requete_info->execute(array(':userid'=>$user_ID));
    $userdata=$requete_info->fetch();

    
    $user_lastvisit= $userdata['lastvisit_dt'];
    
    
setcookie('cle', $_COOKIE['cle'], time() + 24*3600, '/', null, false, true);
setcookie('isConnected', 1, time() + 24*3600, '/', null, false, true);

?>