<?php
  class Sql {

    public function __construct() {}

    public static function doRequest($sql) {
      $mysql = Mysql::getInstance();
      $mysql->query("USE marmiton");
      $req = $mysql->query($sql);

      return $req;
    }
  }
?>
