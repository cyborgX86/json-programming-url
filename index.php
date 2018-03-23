<?php

require_once ('functions.inc.php');
require_once ('config.inc.php');

// Inicialización de variables
$json = file_get_contents('json/' . $fileChannels);
$programming = json_decode($json,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titlePage; ?></title>
    <meta http-equiv="refresh" content="<?php echo refreshTime(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
<div id="container" style="width:100%; height:100%;">
  <nav style="margin: 0px; height: 3%;" class="navbar navbar-default">
    <div style="margin: 0px; height: 3%;"class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand"><?php echo $titleHeader; ?></a>
        <a class="navbar-brand">:::: <?php echo $subTitleHeader; ?> ::::</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php
          getProgramming();
          echo '<li class="active"><a>Canal: #' . getChannel()[Name] . '</a></li>';
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div id="url">
    <?php
    echo '<iframe width="100%" height="1020 px" src="' . getChannel()[Object] . '"
          frameborder="0" scrolling="no">';
    ?>
  </div>
</div>
</body>
</html>
