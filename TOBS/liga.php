<?php
$countryName=$_GET['country'];

$APIkey='43ecacc29fbe6c9a27c351ed99dada6e923489a0708967ba72f0c31a70d55c60';
$url="https://allsportsapi.com/api/football/?met=Leagues&APIkey=".$APIkey;
$json= file_get_contents($url);
$datos=json_decode($json,true);
$pageTitle = $countryName;
require_once ('layouts/top.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liga</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  </head>
  <body>
    <div class="container ">
      <div class="alert alert-dark">
        <div class="alert-heading text-center">
          <h2>Ligas de <?php echo $pageTitle ?></h2>
        </div>
      </div>
<?php
$length = count($datos['result']);
$bool=false;
$i=0;
while ($i < $length && $bool!=true) {

  if (strcmp($countryName, $datos['result'][$i]['country_name']) == 0) {
    ?><a href="liga.php?country=<?php echo $countryName?>" class="list-group-item list-group-item-action"> <?php echo $datos['result'][$i]['league_name'] ?></a>
  <?php
  $bool=true;
}
  $i++;
}


if ($bool==false) {
  ?>

<a href="index.php" class="list-group-item list-group-item-action"> No hay datos de las ligas de <?php echo $countryName ?></a>
<?php
}?>
