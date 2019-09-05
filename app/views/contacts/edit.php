<?php $this->setSiteTitle('Edit Contact'); ?>
<?php $this->start('body'); ?>
<div class="col-md-8 col-md-offset-2 well">
  <a href="<?PROOT?>contacts" class="btn btn-xs btn-default">Back</a>
  <h2 class="text-center">Edit <?=$this->contact->displayName();?></h2>
  <hr>
  <?php $this->partial('contacts', 'form'); ?>
</div>
<?php $this->end(); ?>
