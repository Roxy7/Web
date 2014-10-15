<?php
define("GOOGLE_API_KEY", "AIzaSyApzcuSO5KTvvnGQ6nr3yA5UjksQf1TqKM");


//header("Location: connection.php");
/* Connexion au serveur : dans cet exemple, en local sur le serveur d'évaluation */
$hostname = "db536690787.db.1and1.com";
$database = "db536690787";
$username = "dbo536690787";
$bddpassword = "A6ntxcsy";

// Configuration des options de connexion

// Désactive l'éumlateur de requêtes préparées (hautement recommandé)
$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;

//      Active le mode exception
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

// Indique le charset
$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";

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
?>