<?php
  function call($controller, $action) {

    require_once('controllers/' . $controller . 'Controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'recipes':
        require_once('models/sql.php');
        require_once('models/recipes.php');
        $controller = new RecipesController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array(
    'pages' => ['home', 'error'],
    'recipes' => ['all', 'add', 'addRecipe', 'detailRecipe', 'error'],
  );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
