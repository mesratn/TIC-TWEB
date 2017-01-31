<?php
  $GLOBALS['hote'] = "localhost";
  $GLOBALS['port'] = "8889";
  $GLOBALS['user'] = "root";
  $GLOBALS['pass']= "root";

  class Mysql {
    public static $instance = NULL;

    private function __construct() {}
    private function __clone() {}

    public static function checkConnexion() {
      if(!mysqli_connect($GLOBALS['hote'].":".$GLOBALS["port"], $GLOBALS['user'], $GLOBALS['pass']))
        header('Location: views/pages/home.php');
    }

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host='.$GLOBALS["hote"].';port='.$GLOBALS["port"].'', $GLOBALS["user"], $GLOBALS["pass"], $pdo_options);
      }

      return self::$instance;
    }
  }
?>
