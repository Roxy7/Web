<?php
echo 'mail.php';


$MailContent='';
$MailTitle='';

$requete_vinnity = "SELECT vinnity_id,vinnity_nom,max(message_ts) as message_ts FROM vinnity "
        . "inner join abonnement on abonnement.abonnement_vinnity = vinnity.vinnity_id "
        . "inner join message on vinnity.vinnity_id = message.message_vinnity "
        . "where vinnity_id = :vinnity_id "
        . "group by vinnity_id,vinnity_nom "
        . "order by message_ts desc";    
$requete_vinnity_prep = $connect->prepare($requete_vinnity);
$requete_vinnity_prep->execute(array(':vinnity_id'=>$vinnityID));   
while ($vinnity_data = $requete_vinnity_prep->fetch()) { 
    $MailTitle .= $vinnity_data['vinnity_nom']."\n\n";
$requete = "SELECT * FROM message inner join membre on membre.membre_id=message.message_user WHERE message_vinnity = :vinnity order by message_ts desc";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':vinnity'=>$vinnity_data['vinnity_id']));
while ($donnees = $req_prep->fetch())
{
   $MailContent .= "(".$donnees['message_ts'].") ".$donnees['membre_pseudo']." : ".$donnees['message_txt']."\n";
}
$req_prep->closeCursor();
}




?>
