<?php

class Ingredients {

  public function __construct() {
  }

  public function getByID($id) {
    $sql = "SELECT ING.*
            FROM ingredient AS ING
            JOIN list_recette_ingredient AS RIT
            ON RIT.ID_ingredient = ING.ID
            JOIN recette AS RTT
            ON RIT.ID_recette = RTT.ID
            WHERE RTT.ID = $id;";
    $req = Sql::doRequest($sql);
    $data = $req->fetchAll();
    $i = 0;

    foreach ($data as $j => $val) {
        $ingredients[$i] = $val;
        $i++;
    }
    return $ingredients;
  }

}
 ?>
