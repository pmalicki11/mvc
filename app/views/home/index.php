<?php $this->start('body');?>
<h1 class="text-center red">Welcome in MVC Framework!</h1>
<?= inputBlock('text', 'Favourite color:', 'favourite_color', '', ['strOnly' => 'false'], ['data-id' => '1']); ?>
<?= submitBlock('Save', ['class' => 'btn btn-primary'], ['class' => 'text-right']); ?>
<?php $this->end();?>
