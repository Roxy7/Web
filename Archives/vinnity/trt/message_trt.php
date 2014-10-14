<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

$requete_newMsg="INSERT INTO  message (message_txt ,message_user ,message_vinnity)VALUES (:msg, :user, :vinnity)";



$requete_newMsg_prep = $connect->prepare($requete_newMsg);
$inser_exec = $requete_newMsg_prep->execute(array(':msg'=>$_POST['msg'],':user'=>$_POST['user_id'],':vinnity'=>$_POST['vinnity']));
if ($inser_exec === true) 
      {
    
    echo "OK";
} else {
    echo "ko";
}



header("Location: ../index.php");
?>
