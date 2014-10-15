<?php
//header('Content-type: text/html; charset=UTF-8');
ob_start();
session_start();


include('../param/bdd.php');


// Initialisation de la variable du message de r�ponse


$pseudo = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['password']);

$page_valid=0;


// Si le formulaire est envoy�
if (isset($pseudo,$pass))
{

	// Teste que les valeurs ne sont pas vides ou compos�es uniquement d'espaces
	$pseudo = trim($pseudo) != '' ? $pseudo : null;
	$pass = trim($pass) != '' ? $pass : null;
	 

	// Si $pseudo et $pass diff�rents de null
	if(isset($pseudo,$pass))
	{


		


		// Requ�te pour compter le nombre d'enregistrements r�pondant � la clause : champ du pseudo de la table = pseudo post� dans le formulaire
		$requete = "SELECT * FROM membre WHERE membre_pseudo = :nom and externe = 0 and actif = 1";

		try
		{
			// pr�paration de la requ�te
			$req_prep = $connect->prepare($requete);

			// Ex�cution de la requ�te en passant la position du marqueur et sa variable associ�e dans un tableau
			$req_prep->execute(array(':nom'=>$pseudo));

			// R�cup�ration du r�sultat
			$resultat = $req_prep->fetch();

                            if (password_verify($pass, $resultat['pass'])) {
				//$message = 'Vous etes connecté';
				//$message_type = 'success';
                                setcookie('cle', $resultat['cle'], time() + 24*3600, '/', null, false, true);
                                setcookie('isConnected', 1, time() + 24*3600, '/', null, false, true);
                                $page_valid=1;
                                $requete_log = "insert into cnx_log (cnx_log_pseudo,cnx_log_act) values (:membre,1)";
                                $requete_log = $connect->prepare($requete_log);
                                $requete_log->execute(array(':membre'=>$resultat['membre_id']));
                            }
                            else {
				$message = 'Mauvais login / mdp ou compte non activé';
				$message_type = 'danger';
                            }
		}
		catch (PDOException $e)
		{
			exit('Sortie 2'.$e->getMessage());
			$message = 'Problème dans la requête';
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