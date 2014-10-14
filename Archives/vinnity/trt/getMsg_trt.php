<?php
ob_start();
include('param/bdd.php');
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1) {
$requete = "SELECT * FROM message inner join membres on membres.ID=message.message_user WHERE message_discussion = :discussion order by message_ts";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':discussion'=>1));
?>
<div class="panel-group" id="accordion1">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-comment"></span>
                    C'est Ok ?<span class="badge pull-right">2</span>
                </h3>
            </a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body pre-scrollable">
                
<?php
while ($donnees = $req_prep->fetch())
{
?>
                <div class="row">
                    <div class="
                         <?php
                            if($_COOKIE['pseudo']==$donnees['pseudo']) {
                                echo 'col-xs-10 col-xs-offset-2 bg-info message';
                            } else {
                                echo 'col-xs-10 bg-warning message';
                                }
                         ?>
                         ">
                        <?php 
                            if($_COOKIE['pseudo']==$donnees['pseudo']) {
                                echo $donnees['message_txt'];
                            } else {
                                echo '<strong>'.$donnees['pseudo'].'</strong> : '.$donnees['message_txt'];
                            }
                        ?>
                    </div>
                </div>
<?php          
}  
?>
            </div>
        </div>
    </div>
</div>	
        
<?php       

$req_prep->closeCursor();
}else{
 echo 'Connecte toi !   ';
}
?>
