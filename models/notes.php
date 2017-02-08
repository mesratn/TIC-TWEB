<?php

class Notes {

  public function __construct() {
  }

  public function getByID($id) {
    $sql = "SELECT Note, Commentaire, Pseudo, Date FROM note WHERE ID_recette = $id";
    $req = Sql::doRequest($sql);
    $data = $req->fetchAll();
    $i = 0;

    foreach ($data as $j => $val) {
        $notes[$i] = $val;
        $i++;
    }
    return $notes;
  }

  public function add($idRecette, $note, $text, $author, $email) {
    $now = date("Y-m-d H:i:s");
    $sql = "INSERT INTO note VALUES ('".$idRecette."', '".$note."', '".$text."', '".$author."', '".$email."', '".$now."');";
    $req = Sql::doRequest($sql);
  }

}
 ?>
