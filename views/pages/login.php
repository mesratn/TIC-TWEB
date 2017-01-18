<?php require_once('../../credentials.php'); ?>
<DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../lib/jstree/themes/default-dark/style.css">
        <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="../../lib/bootstrap/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/topbar.css">
        <link rel="stylesheet" href="../../css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <script src="../../lib/jquery-3.1.1.min.js"></script>
    </head>
    <body style="background-color: #2b3642" ng-app="MyPhpMyAdmin">
    <div id="wrapper">

        <div class="login-div">
            <form class="login-form">
                <h3 style="text-align: center"> Connection</h3>

                <div class="form-group form-group-margins">
                    <label for="confirm" class="cols-sm-2 control-label">Host </label>
                    <div class="cols-sm-10">
                        <div class="input-group input-group-dark">
                            <span class="input-group-addon input-group-addon-dark"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-dark" name="host" id="host" value="localhost">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-margins">
                    <label for="confirm" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group input-group-dark">
                            <span class="input-group-addon input-group-addon-dark"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-dark" name="username" id="username" value="root">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-margins">
                    <label for="confirm" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group input-group-dark">
                            <span class="input-group-addon input-group-addon-dark"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control input-dark" name="password" id="password">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-margins">
                    <label for="confirm" class="cols-sm-2 control-label">Port</label>
                    <div class="cols-sm-10">
                        <div class="input-group input-group-dark">
                            <span class="input-group-addon input-group-addon-dark"><i class="fa fa-lock fa-plug" aria-hidden="true"></i></span>
                            <input type="text" class="form-control input-dark" name="port" id="port" value="3306">
                        </div>
                    </div>
                </div>

                <div style="margin-top: 40px;display: flex" class="form-group form-group-margins ">
                    <button type="submit" style="width: 100%" class="btn btn-info">Go</button>
                </div>

            </form>

            <?php
            if(isset($_GET['host']) && isset($_GET['username']) && isset($_GET['username']) && isset($_GET['port'])){
              echo '<div style="" class="alert alert-danger" role="alert">';
              echo "<p style='display:none;'>";
              Mysql::connexion($_GET['host'], $_GET['username'], $_GET['password'], $_GET['port']);
              echo "</p>";
              echo "<p><strong>Sorry !</strong><br>Connexion refused : Bad credentials</p>";
              echo '</div>';
          }
            ?>


        </div>

    </div>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
