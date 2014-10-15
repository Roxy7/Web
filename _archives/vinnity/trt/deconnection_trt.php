<?php
ob_start();
include('../param/bdd.php');
include('getInfo_trt.php');
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1)
{
    
        
        $requete_log = "insert into cnx_log (cnx_log_pseudo,cnx_log_act,cnx_log_dt) values (:membre,0,now())";
        $requete_log = $connect->prepare($requete_log);
        $requete_log->execute(array(':membre'=>$user_ID));
        unset($_COOKIE['cle']);
        unset($_COOKIE['isConnected']);
        setcookie('isConnected', '', time() - 3600, '/');
        setcookie('cle', '', time() - 3600, '/');
}
header('Location: /index.php');
?>