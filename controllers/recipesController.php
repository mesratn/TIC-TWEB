<?php
  class RecipesController {
    public function all() {
      $recipes = Recipe::get();

      require_once('views/recipes/all.php');
    }

    public function add() {
      require_once('views/recipes/add.php');
    }

    public function addRecipe() {
      Recipe::add();
      require_once('views/recipes/addRecipe.php');
    }

    public function detailRecipe() {
      require_once('views/recipes/detailRecipe.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
