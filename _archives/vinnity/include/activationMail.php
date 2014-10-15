<?php

// Préparation du mail contenant le lien d'activation
$destinataire = $email;
$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'From: Vinnity.ferralis.fr <vinnity@ferralis.fr>' . "\r\n";
$MailTitle = '[Vinnity] - '.$pseudo.', activer votre compte';


// Le lien d'activation est composé du login(log) et de la clé(cle)
$MailContent = 'Bienvenue sur Vinnity,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://vinnity.ferralis.fr/activation.php?log='.urlencode($pseudo).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
 
 
mail($destinataire, $MailTitle, $MailContent, $headers) ; // Envoi du mail

echo $destinataire;

?>