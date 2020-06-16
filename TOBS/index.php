<?php
$pageTitle = 'Home';

require_once ('layouts/top.php');
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Examen</title>
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
           <h2><?php echo $pageTitle ?></h2>
         </div>
       </div>
       <div class="form-group">

       <form class="" action="" method="get">
         <label for="nombre"> Apellido: </label>
         <input type="text" class="form-control" name="nombre" value="">
         <small id="inputHelp" class="form-text text-muted"> Ingrese solo el apellido del jugador.</small>
         </div>
  <?php
  //       <label for="apellido" >apellido</label>
    //     <input type="text" name="apellido" value="">?>
         <button type="submit" class="btn btn-secondary btn-lg btn-block" name="button">Buscar</button>
       </form>
     </br>
     </br>
     </br>

     <div class="list-group">


<?php

  $APIkey='43ecacc29fbe6c9a27c351ed99dada6e923489a0708967ba72f0c31a70d55c60';

  if (isset($_GET['nombre'])){
  //if (isset($_GET['nombre'], $_GET['apellido'])) {
    //$jugador = $_GET['apellido']."%20".$_GET['nombre'];
    //echo $jugador;
    //header('Location: jugador.php?',$jugador);
    if (empty($_GET['nombre'])) {
      // code...
    }else{
      $name=$_GET['nombre'];
      $url="https://allsportsapi.com/api/football/?&met=Players&playerName=".$name."&APIkey=".$APIkey;
      $json= file_get_contents($url);
      $datos=json_decode($json,true);
      if (!empty($datos['result'])) {
      $length = count($datos['result']);
      for($i=0;$i<$length;$i++){

          $playerName = $datos['result'][$i]['player_name'];
          $playerKey = $datos['result'][$i]['player_key'];
  ?>
        <a href="jugador.php?player=<?php echo $playerKey?>" class="list-group-item list-group-item-action"> <?php echo $playerName; ?></a>

      <?php
    }}else {?>
        <a href="" class="list-group-item list-group-item-action"> No se encontro a nadie </a>
    <?php }
    }
  }
 ?>
    </div>
  </body>
</html>
