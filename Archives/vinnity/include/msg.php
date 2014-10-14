<?php
if(isset($_SESSION['message_type'],$_SESSION['message'])){
?>
<div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Message :</strong> <?php echo $_SESSION['message'] ?>
</div>
<?php
}
?>