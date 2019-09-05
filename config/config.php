<?php

  define('DEBUG', true);
  define('DB_HOST', '127.0.0.1'); // Database host (IP address used to avoid DNS lookup)
  define('DB_NAME', 'art'); // Database name
  define('DB_USER', 'art'); // Database user
  define('DB_PASSWORD', 'art'); // Database password
  define('PROOT', '/art/'); // Set this to '/' for live server
  define('DEFAULT_CONTROLLER', 'Home'); // Default controller if there is not one defined in the url
  define('DEFAULT_LAYOUT', 'default'); // If no layout is set the controller use this layout
  define('SITE_TITLE', 'MVC Framework'); // This will be used if no site is set
  define('MENU_BRAND', 'MVC Framework'); // This is the Brand text in the menu
  define('CURRENT_USER_SESSION_NAME', 'kdn6c59ctybn50v7ebn57bmn39'); // Session name for logged in user
  define('REMEMBER_ME_COOKIE_NAME', '8989J43BN5437hu4jhb43uih94rr'); // Cookie name for logged in user remember me
  define("REMEMBER_ME_COOKIE_EXPIRY", 2592002); // Time in seconds for remrmber me cookie to live (30 days)
  define('ACCESS_RESTRICTED', 'Restricted'); // Controller name for the restricted redirect
