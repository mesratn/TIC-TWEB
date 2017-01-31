<?php
  class RecipesController {
    public function all() {
      $req = Sql::doRequest("SELECT * FROM recette");
      $recipes = $req->fetchAll();
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
