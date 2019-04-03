<?php

  session_start();
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(__FILE__));

  $url = [];
  if(isset($_SERVER['PATH_INFO'])) {
    $url = explode('/', ltrim($_SERVER['PATH_INFO'], '/'));
  }

  require_once(ROOT. DS . 'core' . DS . 'bootstrap.php');
