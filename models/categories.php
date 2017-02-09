<?php

  class Categories {

    public function __construct() {
    }

    public function getAll() {
        $sql = "SELECT * FROM categorie;";
        $req = Sql::doRequest($sql);
        $categories = $req->fetchAll();
        foreach ($categories as $key => $value) {
          $categories[$key]['nbRecipe'] = 0;
          $categories[$key]['nbRecipe'] = Recipe::getNbByCategory($value['ID']);
        }

        return $categories;
      }

      public function getByID($id) {
        $sql = "SELECT CAT.Nom
                FROM categorie AS CAT
                JOIN list_recette_categorie AS RCT
                ON RCT.ID_categorie = CAT.ID
                JOIN recette AS RTT ON RCT.ID_recette = RTT.ID
                WHERE RTT.ID = ".$id.";";
          $req = Sql::doRequest($sql);
          $categories = $req->fetchAll();
          $i = 0;

          foreach ($categories as $k => $val) {
              $categoriesName[$i] = $val['Nom'];
              $i++;
          }
          return $categoriesName;
        }

        public function getNameByID($id)
        {
          $sql = "SELECT CAT.Nom
                  FROM categorie AS CAT
                  JOIN list_recette_categorie AS RCT
                  ON RCT.ID_categorie = CAT.ID
                  JOIN recette AS RTT ON RCT.ID_recette = RTT.ID
                  WHERE RTT.ID = ". $id .";";
          $reqCat = Sql::doRequest($sql);
          $recipeCategory = $reqCat->fetchAll();

          return $recipeCategory;
        }
    }

?>
