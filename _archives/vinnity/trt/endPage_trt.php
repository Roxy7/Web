<?php


$requete_visit = "insert into lastvisit (lastvisit_membre,lastvisit_dt,lastvisit_uri) values (:userid, now(),:uri)";
$requete_visit = $connect->prepare($requete_visit);
$requete_visit->execute(array(':userid'=>$user_ID,':uri'=>$_SERVER[REQUEST_URI]));

?>