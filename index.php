
<title>Marmiton</title>
<meta charset="UTF-8_unicode_ci">
<?php

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/index.php');


?>
