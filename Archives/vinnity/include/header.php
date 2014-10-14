<header>
<nav class="header navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <div clas="logogroup">
                    <img src="img/s_logo.png" alt="Image" id="logo" class="logo "/>
                    <a class="navbar-brand" href="/">innity <span class="badge">Alpha 0.1</span></a>
            </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="menusmall collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
       <li><a href="/index.php?archive=1"><span class="glyphicon glyphicon-trash "></span> Archives</a></li>
       <!-- 
        <li class="dropdown white">
            <a href="#" class="dropdown-toggle white" data-toggle="dropdown"><span class="white">Archives <span class="caret"></span></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/index.php?archive=1">Vinnity</a></li>
            <li class="divider"></li>
            <li><a href="#">Autre</a></li>
          </ul>
        </li>
       -->
<?php
if(!isset($_COOKIE['isConnected']))
{
?>



       
       
       
       <form class="navbar-form navbar-left" method="post" action="trt/connection_trt.php">
        <div class="form-group">
          <input type="text" class="form-control" id="login" name="login" placeholder="Login">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Connexion !</button>
      </form>       
        
<?php
} 
?>

</ul>



      

<?php
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1 and isset($_COOKIE['cle']))
{
?>
<p class="navbar-text navbar-right"  class="">
	<a href="trt/deconnection_trt.php" alt="Se deconnecter"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out" ></span> Deconnection</button></a>
	</p> 

	<p class="navbar-text navbar-right">
            <a href="/profil.php" alt="Gestion de profil">
                <button class="btn btn-primary" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Mon profil">
                    <span class="glyphicon glyphicon-user"></span> <?php echo $user_pseudo ?> 
                </button>
            </a>

	</p>
	
<?php
} else {
?>

<?php 
}
?>	  
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<!--
    <header>
      <div class="visible-lg col-lg-12">
        Entete large
      </div>
      <div class="visible-md col-sm-12">
		Entete moyenne
      </div>
      <div class="visible-sm col-12">
        Entete tablette
      </div>
      <div class="visible-xs col-12">
        Entete smartphone
      </div>
    </header>
-->	

<?php
if(isset($_SESSION['message']))
{

switch ($_SESSION['message_type']) {
    case "success":
        $strongMessage = "Félicitation :"; 
        break;
    case "info":
        $strongMessage = "Information :"; 
        break;
    case "warning":
        $strongMessage = "Attention !"; 
        break;
    case "danger":
        $strongMessage = "Erreur !"; 
        break;
}    
    
    
   
    
?>
<div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong><?php echo $strongMessage; ?></strong> <?php echo $_SESSION['message']; ?>
</div>
<?php
}
?>
