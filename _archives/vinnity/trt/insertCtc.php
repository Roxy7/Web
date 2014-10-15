<?php
ob_start();
header('Content-type: text/html; charset=UTF-8');
include('../param/bdd.php');

$req_insertCtc="INSERT INTO contact (contact_user, contact_contact) VALUES ";
foreach ($_POST['contact'] as $selectedOption)
    $req_insertCtc .= "(".$_POST['user_id'].",".$selectedOption."), ";

$req_insertCtc = rtrim($req_insertCtc, ", ");

$req_insertCtc_prep = $connect->prepare($req_insertCtc);
$inser_exec = $req_insertCtc_prep->execute();
header("Location: ../contact.php");
?>