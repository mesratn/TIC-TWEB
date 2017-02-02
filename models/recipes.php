<?php

  class Recipe {

    public function __construct() {

    }

    public function get() {
      $req = Sql::doRequest("SELECT * FROM recette");
      $data = $req->fetchAll();
      foreach ($data as $key => $value) {
        $sql = "SELECT CAT.Nom
                FROM categorie AS CAT
                JOIN list_recette_categorie AS RCT
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

      return $recipes;
    }

    public function add() {
      if(isset($_POST)) {
      // $i = 0;
      // echo "E-mail : ".$_POST['email']."<br>";
      // echo "Auteur : ".$_POST['name']."<br>";
      // echo "Titre de la recette : ".$_POST['title']."<br>";
      // echo "Description : ".$_POST['description']."<br>";
      // echo "Temps de préparation : ".$_POST['time']." minutes<br>";
      // echo "Catégories : ".$_POST['category-meat'].", ".$_POST['category-fish'].", ".$_POST['category-deserts'].", ".$_POST['category-pizza'].", ".$_POST['category-salads'];
      //
      // echo( "ingredients : ");
      //
      // while($_POST['ingredientName'][$i])
      // {
      //   echo "<br>".$_POST['ingredientName'][$i]." ".$_POST['ingredientQte'][$i]." ".$_POST['ingredientUnit'][$i].", ";
      //   ++$i;
      // }
      //----
      $now = date("Y-m-d");
      echo $now;
      $l = 0;
        $cat = ["pizza", "dessert"];
        Sql::doRequest("INSERT INTO `recette` (`ID`, `Nom`, `Pseudo`, `Description`, `Temps`, `Date`) VALUES (NULL, '".$_POST['title']."', '".$_POST['name']."', '".$_POST['description']."', '".$_POST['time']."', '".$now."')");
        $res = Sql::doRequest("SELECT `ID` FROM `recette` WHERE `Description` = '".$_POST['description']."' AND `Nom` = '".$_POST['title']."'");
        $idRecette = $res->fetchAll()[0][0];
        echo($idRecette);
        while($cat[$l]){

        if ($_POST['category-'.$cat[$l].''] == "on"){
          $resID = Sql::doRequest("SELECT `ID` FROM `categorie` WHERE `Nom` = '".strtoupper($cat[$l])."';");
          $id = $resID->fetchAll()[0][0];
          echo($id);
          ++$l;
          //Sql::doRequest("INSERT INTO `list_recette_categorie` (`ID_recette`, `ID_categorie`) VALUES ('".$id."', '".$idRecette."')");
        }
        }



    }
  }

  }
?>
