<?php
  class RecipesController {
    public function all() {
      $req = Sql::doRequest("SELECT * FROM recette");
      $data = $req->fetchAll();
      foreach ($data as $key => $value) {
        $sql = "SELECT CAT.Nom
                FROM categorie AS CAT
                JOIN recette_categorie AS RCT
                ON RCT.ID_categorie = CAT.ID
                JOIN recette AS RTT ON RCT.ID_recette = RTT.ID
                WHERE RTT.ID = ". $value['ID'] .";";
        $reqCat = Sql::doRequest($sql);
        $recipeCategory = $reqCat->fetchAll();

        $recipes[$key]['id'] = $value['ID'];
        $recipes[$key]['name'] = $value['Nom'];
        $recipes[$key]['author'] = $value['Pseudo'];
        $recipes[$key]['date'] = $value['Date'];
        $i = 0;
        foreach ($recipeCategory as $k => $val) {
            $recipes[$key]['categories'][$i] = $val['Nom'];
            $i++;
        }
      }

      require_once('views/recipes/show.php');
    }

    public function add() {
      require_once('views/recipes/add.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
