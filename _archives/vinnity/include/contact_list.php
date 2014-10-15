<div class="noborder nomargin nopadding">
<!-- <span class="list-group-item active">Contacts</span> -->
<a href="contact.php" class="newctc noborder "><span class="glyphicon glyphicon-plus"></span> Nouveau contact</a>
<?php

$rq_ctc = "SELECT contact_id,membre.membre_id,membre.membre_pseudo,membre.externe,membre_avatar,membre_mail "
        . "FROM membre "
        . "inner join contact on contact.contact_contact = membre.membre_id "
        . "and contact.contact_user = :user_id "
        . "order by membre_pseudo";
try {
    $rq_ctc = $connect->prepare($rq_ctc);
    $rq_ctc->execute(array(':user_id'=>$user_ID));
    $resultat = $rq_ctc->rowCount();
    if ($resultat != 0){
        

        while ($lstctc = $rq_ctc->fetch())
        {
            if($lstctc['externe']==0){
                
                if ($lstctc['membre_avatar'] != ''){
                    echo '<span class="ctcmembrephoto list-group-item list-group-item-success" >';
                    echo '<span  rel="tooltip" data-toggle="tooltip" data-container="body" data-html="true" data-placement="left" title="'.$lstctc['membre_pseudo'].' </br>('.$lstctc['membre_mail'].')"><img src="'.$lstctc['membre_avatar'].'" class="img-ctc" alt="Responsive image" >';
                    echo ' '.$lstctc['membre_pseudo'].'</span>';
                    echo ' 	<a href="../trt/supprctc_trt.php?ctc_id='.substr($lstctc['contact_id'],0,15).'" alt="Supprimer" class="text-danger" ><span class="top-15 glyphicon glyphicon-remove pull-right" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Supprimer"></span></a>'.'</span>';
                    echo '';
                    
                } else {
                    echo '<span class="ctcmembre list-group-item list-group-item-success">';
                    echo '<span  rel="tooltip" data-toggle="tooltip" data-container="body" data-html="true" data-placement="left" title="'.$lstctc['membre_pseudo'].' </br>('.$lstctc['membre_mail'].')"><span class="glyphicon glyphicon-user"></span>';
                    echo ' '.substr($lstctc['membre_pseudo'],0,15).'</span>';
                    echo ' 	<a href="../trt/supprctc_trt.php?ctc_id='.$lstctc['contact_id'].'" alt="Supprimer" class="text-danger"><span class="glyphicon glyphicon-remove pull-right" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Supprimer"></span></a>'.'</span>';
                }
                

            } else {
                echo '<span class="ctcexternal list-group-item list-group-item-warning">';
                if ($lstctc['membre_avatar'] != ''){
                    echo '<span  rel="tooltip" data-toggle="tooltip" data-container="body" data-html="true" data-placement="left" title="'.$lstctc['membre_pseudo'].' </br>('.$lstctc['membre_mail'].')"><img src="'.$lstctc['membre_avatar'].'" class="img-ctc" alt="Responsive image">';
                } else {
                    echo '<span  rel="tooltip" data-toggle="tooltip" data-container="body" data-html="true" data-placement="left" title="'.$lstctc['membre_pseudo'].' </br>('.$lstctc['membre_mail'].')"><span class="glyphicon glyphicon-user"></span>';
                }
                echo ' <em>'.substr($lstctc['membre_pseudo'],0,15).' <small>(ext)</small></em></span>';
                echo ' 	<a href="../trt/supprctc_trt.php?ctc_id='.$lstctc['contact_id'].'" alt="Supprimer" class="text-danger"><span class="glyphicon glyphicon-remove pull-right" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Supprimer"></span></a>'.'</span>';
            }
        }
        
    }
}
catch (PDOException $e)
{
        echo $e->getMessage();
}

?>
</div>