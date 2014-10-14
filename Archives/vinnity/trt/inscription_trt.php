<?php
ob_start();
session_start();


// Indique le bon format des entêtes (par défaut apache risque de les envoyer au standard ISO-8859-1)
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');
// Initialisation de la variable du message de réponse
$message = 'init';
$message_type = 'default';

$pseudo = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);
$wantMail = htmlspecialchars($_POST['membre_wantMail']);
$cle = md5(microtime(TRUE)*100000);

$page_valid=0;

// Si le formulaire est envoyé
if (isset($pseudo,$pass)) 
{   

    // Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces   
    $pseudo = trim($pseudo) != '' ? $pseudo : null;
    $pass = trim($pass) != '' ? $pass : null;
   

    // Si $pseudo et $pass différents de null
        if(isset($pseudo,$pass)) 
    {
                // Connexion
                try
                {
                        $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $bddpassword, $pdo_options);
                }
                catch (PDOException $e)
                {
                        exit('Sortie 1'.$e->getMessage());
						$message = 'problème de connexion à la base';
						$message_type = 'danger';
                }
                                
                
                // Requête pour compter le nombre d'enregistrements répondant à la clause : champ du pseudo de la table = pseudo posté dans le formulaire
                $requete = "SELECT count(*) FROM membre WHERE membre_pseudo = :pseudo or membre_mail = :email";
                try
                {
                        // préparation de la requête
                        $req_prep = $connect->prepare($requete);
                        
                        // Exécution de la requête en passant la position du marqueur et sa variable associée dans un tableau
                        $req_prep->execute(array(':pseudo'=>$pseudo,':email'=>$email));
                        
                        // Récupération du résultat
                        $resultat = $req_prep->fetchColumn();
                        
                        if ($resultat == 0) 
                        // Résultat du comptage = 0 pour ce pseudo, on peut donc l'enregistrer 
                        {
                                // Pour enregistrer la date actuelle (date/heure/minutes/secondes) on peut utiliser directement la fonction mysql : NOW()
                                $insertion = "INSERT INTO membre("
                                        . "membre_pseudo,pass,membre_mail,membre_wantMail,date_enregistrement,cle) "
                                        . "VALUES(:nom, :password,:membre_mail,:membre_wantMail,NOW(),:cle)";
                                
                                // préparation de l'insertion
                                $insert_prep = $connect->prepare($insertion);
                                
                                // Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau
                                $inser_exec = $insert_prep->execute(array(
                                        ':nom'=>$pseudo,
                                        ':password'=>password_hash($pass, PASSWORD_DEFAULT),
                                        ':membre_mail'=>$email,
                                        ':membre_wantMail'=>$wantMail,
                                        ':cle'=> $cle
                                    ));
                                
                                /* Si l'insertion s'est faite correctement...*/
                                if ($inser_exec === true) 
                                {
                                    include('../include/activationMail.php');
                                    /*
                                        $_SESSION['login'] = $pseudo;
                                        $message = 'Votre inscription est enregistrée.';
					$message_type = 'success';
                                        setcookie('pseudo', $pseudo, time() + 24*3600, '/', null, false, true);
                                        setcookie('isConnected', 1, time() + 24*3600, '/', null, false, true);
                                        
                                        $requete_log = "insert into cnx_log (cnx_log_pseudo,cnx_log_act) values (:membre,2)";
                                        $requete_log = $connect->prepare($requete_log);
                                        $requete_log->execute(array(':membre'=>$pseudo));
                                    */    
                                    $message = "Votre compte a bien été créé. Un mail d'activation vous a été envoyer afin de finaliser votre inscription. "
                                            . "Merci de suivre les indication décrites dans le mail.";
                                    $message_type = 'success';
                                    $page_valid=1;
                                        
                                }   
                        }
                        else
                        {   // Le pseudo est déjà utilisé
                            $message = 'Ce pseudo est déjà utilisé, changez-le.';
                            $message_type = 'warning';
                        }
                }
                catch (PDOException $e)
                {
                        $message = 'Problème dans la requête d\'insertion '.$e->getMessage();
			$message_type = 'danger';
                }       
        }
        else 
        {    // Au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli
                $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
		$message_type = 'danger';
        }
}
$_SESSION['message']=$message;
$_SESSION['message_type']=$message_type;
if ($page_valid == 1) {
    header("Location: /index.php");
} else {
    header("Location: /index.php");
}
?>