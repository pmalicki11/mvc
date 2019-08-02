<form class="form" action="<?=$this->postAction;?>" method="post">
  <div class="form-errors"><?=$this->displayErrors;?></div>
  <?= FH::csrfInput(); ?>
  <?= FH::inputBlock('text', 'First Name', 'fname', $this->contact->fname, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Last Name', 'lname', $this->contact->lname, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Address', 'address', $this->contact->address, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Address 2', 'address2', $this->contact->address2, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'City', 'city', $this->contact->city, ['class' => 'form-control'],['class' => 'form-group col-md-5']); ?>
  <?= FH::inputBlock('text', 'State', 'state', $this->contact->state, ['class' => 'form-control'],['class' => 'form-group col-md-3']); ?>
  <?= FH::inputBlock('text', 'Zip code', 'zip', $this->contact->zip, ['class' => 'form-control'],['class' => 'form-group col-md-4']); ?>
  <?= FH::inputBlock('text', 'Email', 'email', $this->contact->email, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Cell phone', 'cell_phone', $this->contact->cell_phone, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Home phone', 'home_phone', $this->contact->home_phone, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <?= FH::inputBlock('text', 'Work phone', 'work_phone', $this->contact->work_phone, ['class' => 'form-control'],['class' => 'form-group col-md-6']); ?>
  <div class="col-md-12 text-right">
    <a href="<?=PROOT?>contacts" class="btn btn-default">Cancel</a>
    <?= FH::submitTag('Save', ['class' => 'btn btn-primary']); ?>
  </div>
</form>
