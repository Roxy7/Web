<?php session_start();
include('param/bdd.php');
if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1 and isset($_COOKIE['cle']))
{
    include('trt/getInfo_trt.php');
}

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
        if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1) {
            // when user is connected
?>

<div class="row">
  <div class="col-sm-12">
      
      <?php include('include/newVinnity.php'); ?>
      <?php include('include/getVinnityMsg.php'); ?>
  
  </div>

</div>
 
<?php
            
            
        }else{
        include('include/notConnected.php');
        }
    ?>
</div>
   <?php 
        if(isset($_COOKIE['isConnected']) and $_COOKIE['isConnected']==1) {
?>
        <div class="ctclist"><?php include('include/contact_list.php'); ?></div>
<?php
        }
      ?>
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