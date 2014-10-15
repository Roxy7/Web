<div class="row">
<?php
if(isset($_GET['archive'])){
    $archive = 1;
} else {
    $archive = 0;
}

        $requete_vinnity = "SELECT vinnity_id,vinnity_nom,max(message_ts) as message_ts FROM vinnity "
                . "left outer join abonnement on abonnement.abonnement_vinnity = vinnity.vinnity_id "
                . "left outer join message on vinnity.vinnity_id = message.message_vinnity "
                . "where abonnement_membre = :user_id "
                . "and vinnity_archive = :archive "
                . "group by vinnity_id,vinnity_nom "
                . "order by message_ts desc";    
        $requete_vinnity_prep = $connect->prepare($requete_vinnity);
        $requete_vinnity_prep->execute(array(':user_id'=>$user_ID,':archive'=>$archive));   
        while ($vinnity_data = $requete_vinnity_prep->fetch()) { 
 ?>

<div class="col-lg-4 col-md-6 col-sm-12"> 
<div class="vinnity panel-group" id="accordion<?php echo $vinnity_data['vinnity_id']; ?>">
    <div class="panel panel-success noborder ">
        <a href="#" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash "></span></a>

            <a class="" data-toggle="collapse" data-parent="#accordion<?php echo $vinnity_data['vinnity_id']; ?>" href="#collapse<?php echo $vinnity_data['vinnity_id']; ?>">
                <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left">
                    <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<?php echo $vinnity_data['vinnity_nom']; ?>
                </h3>
                </div>
            </a>
            
        

        
        <?php
            include("include/VinnityOptions.php")
        ?>
        
        <div id="collapse<?php echo $vinnity_data['vinnity_id']; ?>" class="panel-collapse collapse 
            <?php 
            if($user_lastvisit<$vinnity_data['message_ts'])
                echo 'in';
            ?>
             ">
            <div class="panel-body pre-scrollable">    
<?php    
$requete = "SELECT * FROM message inner join membre on membre.membre_id=message.message_user WHERE message_vinnity = :vinnity order by message_ts";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':vinnity'=>$vinnity_data['vinnity_id']));
?>
                    <?php
                    while ($donnees = $req_prep->fetch())
                    {
                    ?>
                                    <div class="row">
                                        <div class="
                                             <?php
                                                if($user_ID==$donnees['membre_id']) {
                                                    
                                                    echo 'col-xs-10 col-xs-offset-2 bg-info message';
                                                } else {
                                                    if($user_lastvisit>$donnees['message_ts'])
                                                    {
                                                        echo 'col-xs-10 bg-warning message';
                                                    } else {
                                                        echo 'col-xs-10 bg-success message';
                                                    }
                                                    }
                                             ?>
                                             ">
                                            <?php 
                                                if($user_ID==$donnees['membre_id']) {
                                                    echo nl2br($donnees['message_txt']);
                                                } else {
                                                    echo '<span class="glyphicon glyphicon-comment"></span> <strong>'.$donnees['membre_pseudo'].'</strong> : '.nl2br($donnees['message_txt']);
                                                }
                                            ?>
                                        </div>
                                    </div>
                    <?php
                    }
                    $req_prep->closeCursor();
                    ?>  
                <span id="ancre<?php echo $vinnity_data['vinnity_id']; ?>"></span>
                </div><div class="panel-footer">
 <form method="post" action="trt/insertMessage_trt.php">
     <div class="row">
                    <div class="form-group">
                        <div class="col-xs-10 nopadding">
                    <textarea class="form-control input-sm" rows="2" id="msg" name="msg" placeholder="Saisissez un message"></textarea>
                        </div>
                        <div class="col-xs-1 col-xs-offset-1 nopadding">
                            <button id="sendbutton<?php echo $vinnity_data['vinnity_id']; ?>" type="submit" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-comment"></span></button>
                        </div>
</div>


                <input type="hidden" class="form-control" id="vinnity" name="vinnity" value="<?php echo $vinnity_data['vinnity_id']; ?>">
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">
</form>
                </div>         
                
                
            </div>
            
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    window.location.hash = '#ancre<?php echo $vinnity_data['vinnity_id']; ?>';
</script> 
<?php
}
?>
</div>