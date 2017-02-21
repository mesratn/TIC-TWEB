<?php
  class RecipesController {
    public function all() {
      $recipes = Recipe::getAll();

      if ($recipes == NULL)
        require_once('views/pages/error.php');
      else
        require_once('views/recipes/all.php');
    }

    public function filter() {
      if(empty($_POST['category']) && empty($_POST['difficulty']))
      {
        $recipes = Recipe::getAll();
      }
      else {
        $recipes = Recipe::getByFilters($_POST['category'], $_POST['difficulty'], $_POST['minTime'], $_POST['maxTime']);
      }

          if ($recipes == NULL)
            require_once('views/pages/errorRecipe.php');
          else
            require_once('views/recipes/all.php');
    }

    public function add() {
      require_once('views/recipes/add.php');
    }

    public function addRecipe() {
      Recipe::add();
      require_once('views/recipes/addRecipe.php');
    }

    public function searchRecipe() {
      if(empty($_GET['search']) || empty($_GET['Type']))
      {
        $recipes = Recipe::getAll();
      }
      else {
        $recipes = Recipe::doSearch($_GET['Type']);
      }

          if ($recipes == NULL)
            require_once('views/pages/errorRecipe.php');
          else
            require_once('views/recipes/search.php');
    }

    public function detailRecipe() {
      $recipe = Recipe::getByID();
      if(isset($_POST['postDescription'])){
        Notes::add($recipe['id'], $_POST['star'], $_POST['postDescription'], $_POST['postAuthor'], $_POST['postEmail']);
        echo "<script>document.location = '?controller=recipes&action=detailRecipe&id=".$recipe['id'].";</script>";
      }
      $categories = Categories::getByID($recipe['id']);
      $ingredients = Ingredients::getByID($recipe['id']);
      $steps = Steps::getByID($recipe['id']);
      $notes = Notes::getByID($recipe['id']);


      if ($recipe == 0)
        require_once('views/pages/error.php');
      else
        require_once('views/recipes/detailRecipe.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
