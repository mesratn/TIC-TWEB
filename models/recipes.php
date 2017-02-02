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

      return $recipes;
    }

    public function add() {
      if(isset($_POST)) {
      $i = 0;
      echo "E-mail : ".$_POST['email']."<br>";
      echo "Auteur : ".$_POST['name']."<br>";
      echo "Titre de la recette : ".$_POST['title']."<br>";
      echo "Description : ".$_POST['description']."<br>";
      echo "Temps de préparation : ".$_POST['time']." minutes<br>";
      echo( "ingredients : ");

      while($_POST['ingredientName'][$i])
      {
        echo "<br>".$_POST['ingredientName'][$i]." ".$_POST['ingredientQte'][$i]." ".$_POST['ingredientUnit'][$i].", ";
        ++$i;
      }
      //----
      // $now = new Date('now');
      // try{
      //   Sql::doRequest("INSERT INTO recette(Nom, Pseudo, Date) VALUES ('$_POST['title']', '$_POST['name']', $now)");
      // }
      // catch (PDOException $e)
      // {
      //   var_dump($e);
      //   return "some fail-messages";
      // }
    }
  }

  }
?>
