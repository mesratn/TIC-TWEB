<?php

  class Recipe {

    public function __construct() {

    }

    public function getAll() {
      $req = Sql::doRequest("SELECT * FROM recette");
      $data = $req->fetchAll();
      foreach ($data as $key => $value) {

        $recipes[$key]['id'] = $value['ID'];
        $recipes[$key]['name'] = $value['Nom'];
        $recipes[$key]['author'] = $value['Pseudo'];
        $recipes[$key]['time'] = $value['Temps'];
        $recipes[$key]['difficulty'] = $value['Difficulte'];
        $recipes[$key]['date'] = $value['Date'];

        $notes = Notes::getByID($value['ID']);
        $note = 0;
        $count = 0;
        foreach ($notes as $k => $val) {
          $note += $val['Note'];
          $count++;
        }
        $note = $note/$count;
        $recipes[$key]['note'] = round($note);

        $recipeCategory = Categories::getNameByID($value['ID']);
        $i = 0;
        foreach ($recipeCategory as $k => $val) {
            $recipes[$key]['categories'][$i] = $val['Nom'];
            $i++;
        }
      }

      return $recipes;
    }

    public function getByFilters($categories, $difficulty, $minTime, $maxTime) {
      $req = Sql::doRequest("SELECT * FROM recette WHERE Difficulte = '".$difficulty."' AND Temps > ".$minTime." AND Temps < ".$maxTime."");
      $data = $req->fetchAll();
      $cpt = 0;
      foreach ($data as $key => $value) {

        $recipes[$key]['id'] = $value['ID'];
        $recipes[$key]['name'] = $value['Nom'];
        $recipes[$key]['author'] = $value['Pseudo'];
        $recipes[$key]['time'] = $value['Temps'];
        $recipes[$key]['difficulty'] = $value['Difficulte'];
        $recipes[$key]['date'] = $value['Date'];

        $notes = Notes::getByID($value['ID']);
        $note = 0;
        $count = 0;
        foreach ($notes as $k => $val) {
          $note += $val['Note'];
          $count++;
        }
        $note = $note/$count;
        $recipes[$key]['note'] = round($note);

        $recipeCategory = Categories::getNameByID($value['ID']);
        $i = 0;
        foreach ($recipeCategory as $k => $val) {
            $recipes[$key]['categories'][$i] = $val['Nom'];
            $i++;
        }
        if(!empty($categories)){
        foreach ($categories as $a => $catName) {
          if (in_array($catName, $recipes[$key]['categories'])) {
            // echo "<script>alert('".$catName."');</script>";
            $recipesFiltered[$cpt] = $recipes[$key];
            $cpt++;
            break;
          }
        }
      }
      else {
        $recipesFiltered = $recipes;
      }
      }
      return $recipesFiltered;
    }

    public function getPopular() {
      $req = Sql::doRequest("SELECT * FROM recette");
      $data = $req->fetchAll();
      foreach ($data as $key => $value) {
        $notes = Notes::getByID($value['ID']);
        $note = 0;
        $count = 0;
        foreach ($notes as $k => $val) {
          $note += $val['Note'];
          $count++;
        }
        $note = round($note/$count);
        if($note > 3){
        $recipes[$key]['note'] = $note;

        $recipeCategory = Categories::getNameByID($value['ID']);
        $i = 0;
        foreach ($recipeCategory as $k => $val) {
            $recipes[$key]['categories'][$i] = $val['Nom'];
            $i++;
        }

        $recipes[$key]['id'] = $value['ID'];
        $recipes[$key]['name'] = $value['Nom'];
        $recipes[$key]['author'] = $value['Pseudo'];
        $recipes[$key]['time'] = $value['Temps'];
        $recipes[$key]['difficulty'] = $value['Difficulte'];
        $recipes[$key]['date'] = $value['Date'];
      }

      }

      return $recipes;
    }


    public function getLast() {
      $req = Sql::doRequest("SELECT * FROM recette ORDER BY Date DESC LIMIT 3;");
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
        $recipes[$key]['time'] = $value['Temps'];
        $recipes[$key]['difficulty'] = $value['Difficulte'];
        $recipes[$key]['date'] = $value['Date'];

        $i=0;
        foreach ($recipeCategory as $k => $val) {
            $recipes[$key]['categories'][$i] = $val['Nom'];
            $i++;
        }

        }

      return $recipes;
    }

    public function getNbByCategory($id)
    {
      $recipes = Sql::doRequest("SELECT * FROM list_recette_categorie WHERE ID_categorie = ".$id."");
      $j = 0;
        foreach ($recipes as $key => $value) {
          ++$j;
        }

      return $j;
    }

    public function getByID() {
      if(!isset($_GET['id']))
        return 0;
      $id = $_GET['id'];
      $req = Sql::doRequest("SELECT * FROM recette WHERE ID = $id");
      $data = $req->fetch();
      $recipe['id']= $data['ID'];
      $recipe['name'] = $data['Nom'];
      $recipe['author'] = $data['Pseudo'];
      $recipe['description'] = $data['Description'];
      $recipe['time'] = $data['Temps'];
      $recipe['difficulty'] = $data['Difficulte'];
      $recipe['date'] = $data['Date'];
      $recipe['size'] = $data['Size'];

      return $recipe;
    }


    public function add() {
      if(isset($_POST)) {

      //ADD RECIPE
      $now = date("Y-m-d");
      $l = 0;
        $cat = ["pizza", "dessert", "japonais"];
        Sql::doRequest("INSERT INTO `recette` (`ID`, `Nom`, `Pseudo`, `Description`, `Difficulte`, `Temps`, `Date` , `Size`) VALUES (NULL, '".$_POST['title']."', '".$_POST['name']."', '".$_POST['description']."', '".$_POST['difficulty']."', '".$_POST['time']."', '".$now."', '".$_POST['size']."')");
        $res = Sql::doRequest("SELECT `ID` FROM `recette` WHERE `Description` = '".$_POST['description']."' AND `Nom` = '".$_POST['title']."'");
        $idRecette = $res->fetchAll()[0][0];

          //ADD CATEGORIES
        while($cat[$l]) {
          if ($_POST[$cat[$l]] == "on"){
            $resID = Sql::doRequest("SELECT `ID` FROM `categorie` WHERE `Nom` = '".strtoupper($cat[$l])."';");
             $id = $resID->fetchAll()[0][0];
            Sql::doRequest("INSERT INTO `list_recette_categorie` (`ID_recette`, `ID_categorie`) VALUES ('".$idRecette."', '".$id."')");
          }
        ++$l;
        }
        //ADD INGREDIENT
        $a=0;
        while($_POST['ingredientName'][$a])
        {
          Sql::doRequest("INSERT INTO `ingredient` (`ID`, `Nom`, `Quantite`, `Unite`) VALUES (NULL, '".$_POST['ingredientName'][$a]."', '".$_POST['ingredientQte'][$a]."', '".$_POST['ingredientUnit'][$a]."')");
          $re = Sql::doRequest("SELECT `ID` FROM `ingredient` WHERE `Nom` = '".$_POST['ingredientName'][$a]."' AND `Quantite` = '".$_POST['ingredientQte'][$a]."'");
          $idIngredient = $re->fetchAll()[0][0];
          Sql::doRequest("INSERT INTO `list_recette_ingredient` (`ID_recette`, `ID_ingredient`) VALUES ('".$idRecette."', '".$idIngredient."')");
          ++$a;
        }

        //ADD STEPS
        $e = 0;
        while($_POST['steps'][$e]){
        Sql::doRequest("INSERT INTO `etape` (`Nom`, `Numero`, `Instructions`, `ID_recette`) VALUES ('Nom', '".$e."', '".$_POST['steps'][$e]."', '".$idRecette."')");
        ++$e;
        }
    }
    else {
      require_once("view/pages/error.php");
    }
  }

  }
?>
