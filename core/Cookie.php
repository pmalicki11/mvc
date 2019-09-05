<?php

  class Cookie {

    public static function set($name, $value, $expiry) {
      if(setCookie($name, $value, time() + $expiry, '/')) {
        return true;
      }
      return false;
    }

    public static function delete($name) {
      if(setCookie($name, '', -1, '/')) {
        return true;
      }
      return false;
    }

    public static function get($name) {
      return $_COOKIE[$name];
    }

    public static function exists($name) {
      return isset($_COOKIE[$name]);
    }
  }
