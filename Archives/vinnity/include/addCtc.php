<h2 class="contrast">Rechercher un contact</h2>
<hr>

<div class="row">
    <form class="navbar-form navbar-left" role="search" action="contact.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Par pseudo" name="searcTxt">
        </div>
        <input type="hidden" class="form-control" name="searchType" value="pseudo">  
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
      </form>
</div>
<p class="contrast">ou</p>
<div class="row">
      <form class="navbar-form navbar-left" role="search" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Par email" name="searcTxt">
        </div>
        <input type="hidden" class="form-control" name="searchType" value="email">  
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
      </form>
</div>


<?php

if(isset($_POST['searchType']) or isset($_SESSION['externalexist'])){

    if(isset($_SESSION['externalexist']))
    {
        $searchType = 'email';
        $searcTxt = HTMLSPECIALCHARS($_SESSION['externalexist']); 
    } else {
        $searchType = HTMLSPECIALCHARS($_POST['searchType']);
        $searcTxt = HTMLSPECIALCHARS($_POST['searcTxt']);
    }
    
if($searchType=='pseudo'){

$rq_search = "SELECT membre.membre_id,membre.membre_pseudo, membre_mail,contact_user "
        . "FROM membre "
        . "left outer join contact on membre_id = contact_contact "
        . "where membre_pseudo like :search "
        . "and (contact_user is null or contact_user != :userID) ";
} elseif ($searchType=='email') {
$rq_search = "SELECT membre.membre_id,membre.membre_pseudo, membre_mail,contact_user "
        . "FROM membre "
        . "left outer join contact on membre_id = contact_contact "
        . "where membre_mail like :search "
        . "and (contact_user is null or contact_user != :userID)";
} else {
    echo 'no query';
}


echo '<h3 class="contrast">resultat pour la recherche de : "'.$searcTxt.'"</h3></br>';
?>
<form method="post" action="trt/insertCtc.php">
<select multiple class="form-control" name="contact[]"  size="8">

<?php  
try {
    $rq_search_prep = $connect->prepare($rq_search);
    $res = $rq_search_prep->execute(array(':search'=>'%'.$searcTxt.'%',':userID'=>$user_ID));
    //$rq_search_prep= $connect->query($rq_search);
    //$nb_ligne = $rq_search_prep->rowCount();
    while ($donnees = $rq_search_prep->fetch(PDO::FETCH_ASSOC))
    {
    echo '<option value="'.$donnees['membre_id'].'">'.$donnees['membre_pseudo'].' ('.str_replace("@","(a)",$donnees['membre_mail']).')</option>';
    }
}
catch (PDOException $e)
{
        echo $e->getMessage();
        
}
?>

</select>
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">
<button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Ajoutter</button>
</form>
<?php
}
?>

<h2 class="contrast">Créer un contact externe</h2>
<hr>
<div class="row">
       <form class="navbar-form navbar-left" method="post" action="trt/addexternedestinataire_trt.php">
        <div class="form-group">
          <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
          <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail">
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">
        </div>
        <button type="submit" class="btn btn-success">Créer !</button>
      </form>    
</form>
</div>

