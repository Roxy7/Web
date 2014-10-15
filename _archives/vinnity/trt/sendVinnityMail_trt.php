<?php
include('../include/msgMail.php');



//echo $userID;
$requete = "SELECT tom.membre_mail as to_mail ,tom.membre_pseudo as to_pseudo ,frm.membre_mail as from_mail,frm.membre_pseudo as from_pseudo,tom.cle as cle,tom.actif as actif "
        . "FROM abonnement "
        . "inner join membre as tom on tom.membre_id = abonnement.abonnement_membre "
        . "inner join membre as frm on frm.membre_id = :uid1 "
        . "WHERE abonnement_vinnity = :vinnity "
        . "and tom.membre_wantMail = 1 "
        . "and tom.membre_id <> :uid "
        . "and tom.membre_mail is not null "
        . "order by tom.membre_pseudo";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':uid1'=>$userID,':vinnity'=>$vinnityID,':uid'=>$userID));
while ($donnees = $req_prep->fetch()){
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
    // Additional headers
    $headers .= 'From: '.$donnees['from_pseudo'].' <'.$donnees['from_mail'].'>' . "\r\n";


        $to = $donnees['to_mail'];
        $MailTitle = '[vinnity] - '.$vinnity_nom;
        
        if($donnees['actif']==1){
            $Mailhead = "Vous avez reçu un message depuis la plateforme de communication vinnity.\n\n"
            . "visitez http://vinnity.ferralis.fr\n\n\n";
        } else {
            $Mailhead = "Un amis vous a invité a participer à une discussion via la plateforme de communication Vinnity sous le nom de '".$donnees['from_pseudo']."'.\n\n"
                    . "Inscrivez-vous sur : http://vinnity.ferralis.fr/invitation.php?log=".urlencode($donnees['to_pseudo'])."&cle=".urlencode($donnees['cle'])." pour participer\n"
                    . "Vous continurez à recevoir les messages de la discussion par email même si vous ne vous inscrivez pas dans le but de rester informer de la discussion.\n\n"
                    . "Nous esperons vous retrouver sur vinnity très prochainement\n\n"
                    . "Voici votre message :\n\n";
            
        }
        
        mail($to, $MailTitle, $Mailhead.$MailContent, $headers);
}







?>