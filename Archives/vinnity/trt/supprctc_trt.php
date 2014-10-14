<?php
ob_start();
include('../param/bdd.php');
include('getInfo_trt.php');
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1)
{
$ctc_id = htmlentities($_GET['ctc_id']);

        $requete_deletectc = "delete from contact "
                . "where contact_id = :ctc_id "
                . "and contact_user = :user_id";
        $requete_deletectc = $connect->prepare($requete_deletectc);
        $requete_deletectc->execute(array('ctc_id'=>$ctc_id,':user_id'=>$user_ID));

}
header('Location: /index.php');
?>