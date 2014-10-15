<h2 class="contrast"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $user_pseudo;?></h2>

<hr>

<form role="form" method="post" action="trt/profil_trt.php">
<div class="form-group">
       <div class="input-group">
      <div class="input-group-addon">Pseudo</div> 
   <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?php if($user_pseudo != '') echo $user_pseudo; else echo 'Pseudo ?'; ?>">
       </div>
    <div class="input-group">
      <div class="input-group-addon">Password</div> 
   <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password" value="">
    </div>
    <div class="input-group">
      <div class="input-group-addon">@</div>
      <input class="form-control" id="email" name="email" type="email" value="<?php if($user_mail !='') echo $user_mail; else echo 'eMail ?'?>">
    </div>
  </div>
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_ID; ?>">
    <div class="checkbox">
    <label  class="contrast">
      <input type="checkbox" id="membre_wantMail" name="membre_wantMail" value="1" <?php if ($membre_wantMail==1) { echo "checked";} ?>> Recevoir les messages par e-mail
    </label>
  </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>