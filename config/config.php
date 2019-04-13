<?php

  define('DEBUG', true);
  define('DB_HOST', '127.0.0.1'); // Database host (IP address used to avoid DNS lookup)
  define('DB_NAME', 'art'); // Database name
  define('DB_USER', 'art'); // Database user
  define('DB_PASSWORD', 'art'); // Database password
  define('PROOT', '/art/'); // Set this to '/' for live server
  define('DEFAULT_CONTROLLER', 'Home'); // Default controller if there is not one defined in the url
  define('DEFAULT_LAYOUT', 'default'); // If no layout is set the controller use this layout
  define('SITE_TITLE', 'MVC Framework'); // this will be used if no site is set
