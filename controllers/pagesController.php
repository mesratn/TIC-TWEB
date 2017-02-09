<?php
  class PagesController {
    public function home() {
      $lastRecipe = Recipe::getLast();
      $categories = Categories::getAll();
      $popularRecipe = Recipe::getPopular();
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
