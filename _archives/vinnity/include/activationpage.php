<?php
        unset($_COOKIE['cle']);
        unset($_COOKIE['isConnected']);
        setcookie('isConnected', '', time() - 3600, '/');
        setcookie('cle', '', time() - 3600, '/');
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

<div class="container ">
    <?php 
        include('include/header.php'); 
    ?>
    <h1 class="white">Activation du compte</h1><hr>
    <form class="" method="post" action="trt/activation_trt.php">
 <div class="form-group">
   <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?php echo $login; ?>">
   <input type="password" class="form-control" id="password" name="password" placeholder="Password">
       <div class="input-group">
      <div class="input-group-addon">@</div>
      <input class="form-control" id="email" name="email" type="email" placeholder="Votre email" value="<?php echo $email; ?>">
    </div>
    <div class="checkbox">
    <label class="white">
      <input type="checkbox" id="membre_wantMail" name="membre_wantMail" value="1" checked> Recevoir les messages par e-mail
    </label>
 </div>
   <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">
   <input type="hidden" class="form-control" id="cle" name="cle" value="<?php echo $cle; ?>">
   <input type="hidden" class="form-control" id="uri" name="uri" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
 <button type="submit" class="btn btn-primary pull-right">Activer !</button>
</form>
    
</div>
</div>
<footer>
    <?php include('include/footer.php'); ?>
</footer>
      <?php include('include/inclScript.php'); ?>
      
  </body>
</html>

<?php 
include('include/clearVar.php'); 

if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1)
{
    include('trt/endPage_trt.php');
}
?>