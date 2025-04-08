<?php
  $homeurl = '/skillspot/index.php';
  $homeurlMain = '/skillspot/';
  $homepage = "/skillspot/";
  $currentpage = $_SERVER['REQUEST_URI'];
  $root = $_SERVER['DOCUMENT_ROOT'];
  $base_dir = __DIR__;
  
  // (root level)
  define('BASE_PATH', __DIR__ . '/');
  $localServer = "https://".$_SERVER['SERVER_NAME'];
?>