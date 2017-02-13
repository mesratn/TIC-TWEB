
<title>Marmiton</title>
<meta charset="UTF-8_unicode_ci">
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
<script src="lib/jquery-3.1.1.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/vendors/jquery.js"></script>
<script src="js/vendors/slick.js"></script>
<script src="js/vendors/nouislider.js"></script>
<script src="js/functions.js"></script>
<?php
  require_once('credentials.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/index.php');
?>
