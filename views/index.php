<DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8" />
      <title>Marmiton</title>

      <meta name="description" content="Marmiton" />
      <meta name="author" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

      <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
      <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.css">
      <link rel="stylesheet" href="lib/bootstrap/fonts/font-awesome.min.css">

      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display%7CNoto+Sans:400,400italic,700" />

      <link rel="stylesheet" href="css/screen.css" />

      <script src="lib/jquery-3.1.1.min.js"></script>

    </head>
    <body id="page" class="front-page" ng-app="Marmiton">
      <div class="page-wrapper">
          <?php
            require_once('topbar.php');
            //require_once('sidebar.php');
            require_once('routes.php');
            require_once('footer.php');
            ?>
      </div>

    <script src="js/vendors/jquery.js"></script>
    <script src="js/vendors/slick.js"></script>
    <script src="js/vendors/nouislider.js"></script>
    <script src="js/functions.js"></script>
    </body>
    </html>
