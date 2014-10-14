<div class="panel-group nopadding nomargin vinnityoption" id="accordionMod<?php echo $vinnity_data['vinnity_id']; ?>">

            <p>
                <a data-toggle="collapse" data-parent="#accordionMod<?php echo $vinnity_data['vinnity_id']; ?>" href="#collapseMod<?php echo $vinnity_data['vinnity_id']; ?>"><button class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Inviter</button></a>
                <?php
                    $requete = "SELECT * FROM abonnement "
                            . "inner join membre on membre.membre_id=abonnement.abonnement_membre "
                            . "WHERE abonnement_vinnity = :vinnity "
                            . "order by membre_pseudo";
                    $req_prep = $connect->prepare($requete);
                    $req_prep->execute(array(':vinnity'=>$vinnity_data['vinnity_id']));
                    while ($donnees = $req_prep->fetch()){
                        if($donnees['externe']==0){
                            echo $donnees['membre_pseudo'].' <a href="../trt/supprabo_trt.php?abo_id='.$donnees['abonnement_id'].'"><span class="glyphicon glyphicon-remove-sign red"></span></a> - ';
                        } else {
                            echo '<span class="text-warning"><em>'.$donnees['membre_pseudo'].' <small>(ext)</small></em></span> <a href="../trt/supprabo_trt.php?abo_id='.$donnees['abonnement_id'].'"><span class="glyphicon glyphicon-remove-sign red"></span></a> - ';
                        }
                    }
                ?>
                
            </p>

    

    <div id="collapseMod<?php echo $vinnity_data['vinnity_id']; ?>" class="panel-collapse collapse">
            
            
            <form class="form-horizontal" role="form" method="post" action="trt/insertAbonnement_trt.php">
                <input type="hidden" class="form-control" id="vinnity" name="vinnity" value="<?php echo $vinnity_data['vinnity_id']; ?>">
                <div class="form-group">
                    <label for="Titre" class="col-sm-2 control-label">Contacts</label>
                    <div class="col-sm-10">   
            <select multiple class="form-control" name="usersAb[]"  size="5">
                <?php  
                try {
                    $rq_search = "SELECT membre.membre_id,membre.membre_pseudo, membre_mail,contact_user "
                        . "FROM membre "
                        . "inner join contact on membre_id = contact_contact "
                        . "where contact_user = :userID "
                        . "and membre_id not in ("
                            . "SELECT membre_id FROM abonnement "
                            . "inner join membre on membre.membre_id=abonnement.abonnement_membre "
                            . "WHERE abonnement_vinnity = :vinnity "
                        . ") "
                        . "order by membre.membre_pseudo";
                    $rq_search_prep = $connect->prepare($rq_search);
                    $res = $rq_search_prep->execute(array(':userID'=>$user_ID,':vinnity'=>$vinnity_data['vinnity_id']));
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
                    </div></div>
              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="+" class='btn btn-primary pull-right'></input>
                  </div>
              </div>
            </form>       
                        
        </div>
</div>