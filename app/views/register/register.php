<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3 well">
  <h3 class="text-center">Register</h3>
  <form class="form" action="" method="post">
    <?= FH::csrfInput(); ?>
    <div class="form-errors"><?=$this->displayErrors?></div>
    <div class="form-group">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" class="form-control" value="<?=$this->post['fname']?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" class="form-control" value="<?=$this->post['lname']?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="<?=$this->post['email']?>">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" class="form-control" value="<?=$this->post['username']?>">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password']?>">
    </div>
    <div class="form-group">
      <label for="confirm">Confirm password</label>
      <input type="password" id="confirm" name="confirm" class="form-control" value="<?=$this->post['confirm']?>">
    </div>
    <div class="text-right">
      <input type="submit" class="btn btn-primary btn-large" value="Register">
    </div>
  </form>
</div>
<?php $this->end(); ?>
