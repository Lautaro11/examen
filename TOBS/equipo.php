<?php
$teamKey=$_GET['team'];

$APIkey='43ecacc29fbe6c9a27c351ed99dada6e923489a0708967ba72f0c31a70d55c60';
$url="https://allsportsapi.com/api/football/?&met=Teams&teamId=".$teamKey."&APIkey=".$APIkey;
$json= file_get_contents($url);
$datos=json_decode($json,true);
$teamName = $datos['result'][0]['team_name'];
$pageTitle = $teamName;

require_once ('layouts/top.php');

$teamLogoURL=$datos['result'][0]['team_logo'];
$length = count($datos['result'][0]['players']);
$image=imagecreatefrompng($teamLogoURL);
$img = imagescale($image, 80, 80);
imagejpeg($img,"logos/".$teamName.".png",100);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Equipo</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  </head>
  <body>
    <div class="container">
      <div class="alert alert-dark">
        <div class="alert-heading text-center">
           <img src="logos/<?php echo $teamName ?>.png"/><h2><?php echo $pageTitle ?> </h2>
        </div>
      </div>
      <div class="list-group list-group-horizontal">
        <a href="equipo.php?team=<?php echo $teamKey?>&plantilla=1" class="list-group-item list-group-item-action text-center"> Plantilla</a>
        <a href="equipo.php?team=<?php echo $teamKey?>&fixture=1" class="list-group-item list-group-item-action text-center"> Fixture</a>
      </div>

      <?php if (isset($_GET['plantilla'])) {?>
      <div class="list-group">
      <?php
        for($i=0;$i<$length;$i++){
          $playerName = $datos['result'][0]['players'][$i]['player_name'];
          $playerKey = $datos['result'][0]['players'][$i]['player_key'];
      ?>
        <a href="jugador.php?player=<?php echo $playerKey?>" class="list-group-item list-group-item-action"> <?php echo $playerName; ?></a>
      <?php
        }
    }elseif (isset($_GET['fixture'])) {
    }
    ?>
      </div>
    </div>
  </body>
</html>
