<!DOCTYPE html>
<html lang="en">
  <?php $home = replaceLast('index.php/', '', $router->pathFor('home'));?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Kode Central | 404</title>
    <meta name="description" content="Error 404">
    <link rel="shortcut icon" href="<?=$home?>assets/img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?=$home?>assets/css/preload.min.css">
    <link rel="stylesheet" href="<?=$home?>assets/css/plugins.min.css">
    <link rel="stylesheet" href="<?=$home?>assets/css/style.blue-600.min.css">
    <!--[if lt IE 9]>
        <script src="<?=$home?>assets/js/html5shiv.min.js"></script>
        <script src="<?=$home?>assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="bg-full-page bg-primary back-fixed">
      <div class="mw-500 absolute-center">
        <div class="card animated zoomInUp animation-delay-7 color-primary withripple">
          <div class="card-body">
            <div class="text-center color-dark">
              <h1 class="color-primary text-big">Error 404</h1>
              <h2>Page Not Found</h2>
              <p class="lead lead-sm">We have not found what you are looking for.
                <br>We have put our robots to search.</p>
              <a href="<?=$home?>" class="btn btn-primary btn-raised">
                <i class="zmdi zmdi-home"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=$home?>assets/js/plugins.min.js"></script>
    <script src="<?=$home?>assets/js/app.min.js"></script>
  </body>
</html>
