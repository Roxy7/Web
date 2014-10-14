<div class="row">
<div class="col-lg-12"> 
<div class="newvinnity panel panel-primary noborder" id="accordionN">
    <div class="newvinnity panel-heading noborder">
        <a data-toggle="collapse" data-parent="#accordionN" href="#collapseN">
            <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span> Nouvelle Vinnity</h3>
        </a>
    </div>
    <div id="collapseN" class="newvinnity panel-collapse collapse ">
        <div class="panel-body noborder">
            
            <form class="form-horizontal" role="form" method="post" action="trt/insertVinnity_trt.php">

                <div class="form-group">
                    <label for="Titre" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                            <input type="text" class="form-control" id="Titre" name="Titre">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Titre" class="col-sm-2 control-label">Contacts</label>
                    <div class="col-sm-10">             
<select multiple class="form-control" name="users[]"  size="8">

<?php  
try {
    $rq_search = "SELECT membre.membre_id,membre.membre_pseudo, membre_mail,contact_user "
        . "FROM membre "
        . "inner join contact on membre_id = contact_contact "
        . "where contact_user = :userID";
    $rq_search_prep = $connect->prepare($rq_search);
    $res = $rq_search_prep->execute(array(':userID'=>$user_ID));
    while ($donnees = $rq_search_prep->fetch(PDO::FETCH_ASSOC))
    {
    echo '<option value="'.$donnees['membre_id'].'">'.$donnees['membre_pseudo'].' ('.$donnees['membre_mail'].')</option>';
    }
}
catch (PDOException $e)
{
        echo $e->getMessage();
        
}
?>

</select>
                      </div>
                </div>              
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">

              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Créer la Vinnity" class='btn btn-success pull-right'></input>
                  </div>
              </div>
            </form>
            
            
        </div>

    </div>



</div>
</div>
</div>