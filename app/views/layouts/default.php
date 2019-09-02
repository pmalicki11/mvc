<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title="no title" charset="utf-8">
    <script src="<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src="<?=PROOT?>js/bootstrap.min.js"></script>
    <title><?=$this->siteTitle();?></title>
    <?=$this->content('head');?>
  </head>
  <body>
    <?php include 'main_menu.php'; ?>
    <div class="container-fluid" style="min-height:cal(100% - 125px);">
      <?= Session::displayMsg(); ?>
      <?= $this->content('body'); ?>
    </div>
  </body>
