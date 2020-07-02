<?php
  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'social_media');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/lessons/Socialmedia');
  define('FILES', URLROOT.'/public/uploads');

  // Site Name
  define('SITENAME', 'Social Media');
  // App Version
  define('APPVERSION', '1.0.0');























  

  /*

  <?php

session_start(); // global settings

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => 'localhost',
    'username' => 'root',
    'password' =>  '',
    'db' => 'estudos_skillfeed'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookir_expiry' => 604800
  ),

  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token'
  )
);

spl_autoload_register(function($class) {
  require_once 'classes/'. $class . '.php';
});

require_once 'functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
  $hash = Cookie::get(Config::get('remember/cookie_name'));
  $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
  if ($hashCheck->count()) {
    //echo 'Hash matches, log user in';
    $user = new User($hashCheck->first()->user_id);
    $user->login();
  }
}
*/