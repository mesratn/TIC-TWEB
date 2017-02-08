<?php

class Steps {

  public function __construct() {
  }

  public function getByID($id) {
    $sql = "SELECT Nom, Numero, Instructions FROM etape WHERE ID_recette = $id;";
    $req = Sql::doRequest($sql);
    $data = $req->fetchAll();
    $i = 0;

    foreach ($data as $j => $val) {
        $steps[$i] = $val;
        $i++;
    }
    return $steps;
  }

}
 ?>
