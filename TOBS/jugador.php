<?php
$playerKey=$_GET['player'];

$APIkey='43ecacc29fbe6c9a27c351ed99dada6e923489a0708967ba72f0c31a70d55c60';
$url="https://allsportsapi.com/api/football/?&met=Players&playerId=".$playerKey."&APIkey=".$APIkey;
$json= file_get_contents($url);
$datos=json_decode($json,true);
$playerName = $datos['result'][0]['player_name'];
$pageTitle = "Jugador";

require_once ('layouts/top.php');

$team = $datos['result'][0]['team_name'];
$number = $datos['result'][0]['player_number'];
$country = $datos['result'][0]['player_country'];
$age = $datos['result'][0]['player_age'];
$goals = $datos['result'][0]['player_goals'];
$matchPlayed = $datos['result'][0]['player_match_played'];
$yellowCards = $datos['result'][0]['player_yellow_cards'];
$redCards = $datos['result'][0]['player_red_cards'];
$teamKey = $datos['result'][0]['team_key'];


?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Jugador</title>
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="list-group">
        <div>
        <li class="list-group-item list-group-item-dark text-center"><h3><?php echo $playerName ?></h3></li>
        </div>

          <li class="list-group-item">Nacio en:<a href="liga.php?country=<?php echo $country ?>">  <?php echo $country ?></a> </li>
          <li class="list-group-item">Edad: <?php echo $age ?> años</li>
          <li class="list-group-item">Club: <a href="equipo.php?team=<?php echo $teamKey?>" >  <?php echo $team ?></a></li>
          <li class="list-group-item">Dorsal: <?php echo $number ?> </li>
          <li class="list-group-item">Partidos jugados esta temporada: <?php echo $matchPlayed ?></li>
          <li class="list-group-item">Goles: <?php echo $goals ?></li>
          <li class="list-group-item">Tarjetas amarillas: <?php echo $yellowCards ?></li>
          <li class="list-group-item">Tarjetas rojas: <?php echo $redCards ?></li>
        </ul>
      </div>
    </div>

 </div>
</body>
</html>
