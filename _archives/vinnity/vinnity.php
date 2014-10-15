<?php session_start();
include('param/bdd.php');

$vinnity_pg=$_GET['vinnity'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Vinnity - Alpha 0.1</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/CommUnity.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php include('include/header.php')?>  



<div class="container">
<?php include('include/msg.php')?>  

 <?php
    if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1) {
        $requete_vinnity = "SELECT * FROM vinnity WHERE vinnity_id = :vinnity";    
        $requete_vinnity_prep = $connect->prepare($requete_vinnity);
        $requete_vinnity_prep->execute(array(':vinnity'=>$vinnity_pg));   
        while ($vinnity_data = $requete_vinnity_prep->fetch()) { 
 ?>   
    
    
<div class="media thumbnail">
              <div class="media-body">
                <h4 class="media-heading"><?php echo $vinnity_data['vinnity_nom']; ?></h4>
                <p><?php echo $vinnity_data['vinnity_desc']; ?></p>
              </div>
</div>



<?php
        }

    
$requete_discuss = "SELECT * FROM discussion WHERE discussion_vinnity_id = :vinnity order by discussion_id desc";    
$requete_discuss_prep = $connect->prepare($requete_discuss);
$requete_discuss_prep->execute(array(':vinnity'=>$vinnity_pg));   
while ($discuss_data = $requete_discuss_prep->fetch()) {    
?>
<div class="panel-group" id="accordion<?php echo $discuss_data['discussion_id']; ?>">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion<?php echo $discuss_data['discussion_id']; ?>" href="#collapse<?php echo $discuss_data['discussion_id']; ?>">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-comment"></span>
                    <?php echo $discuss_data['discussion_txt']; ?><span class="badge pull-right">2</span>
                </h3>
            </a>
        </div>
        <div id="collapse<?php echo $discuss_data['discussion_id']; ?>" class="panel-collapse collapse in">
            <div class="panel-body pre-scrollable">    
    
    
<?php    
$requete = "SELECT * FROM message inner join membres on membres.ID=message.message_user WHERE message_discussion = :discussion order by message_ts";
$req_prep = $connect->prepare($requete);
$req_prep->execute(array(':discussion'=>$discuss_data['discussion_id']));
?>

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
                    $req_prep->closeCursor();
                    ?>
            </div>
        </div>
    </div>
</div>
<?php
}
$requete_discuss_prep->closeCursor();
}else{
 echo 'Connecte toi !   ';
}
?>
	

		</div>
      <footer>
          Pied de page
      </footer>
    

	
		<script src="bootstrap/js/jquery.min.js"></script> 
		<script src="bootstrap/js/bootstrap.min.js"></script> 
		<script>
			var d = document.getElementById("navComm");
			d.className = d.className + " active"; 
		</script>
	
		 
  </body>
</html>
<?php include('include/clearVar.php'); ?>