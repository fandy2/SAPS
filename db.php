<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      $localhost = "localhost";
      $user = "root";
      $pass = "";
      $db = "saps";
     return mysqli_connect($localhost, $user, $pass, $db);
    }
  }
?>