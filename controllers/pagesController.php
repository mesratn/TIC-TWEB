<?php
  class PagesController {
    public function home() {
      require_once('views/pages/home.php');
    }

    public function recipe() {
      require_once('views/pages/recipe.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
