<?php
ob_start();
include('../param/bdd.php');
include('getInfo_trt.php');
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1)
{
$abo_id = htmlentities($_GET['abo_id']);

        $requete_deletectc = "delete from abonnement "
                . "where abonnement_id = :abo_id ";
        $requete_deletectc = $connect->prepare($requete_deletectc);
        $requete_deletectc->execute(array('abo_id'=>$abo_id));

}
header('Location: /index.php');
?>