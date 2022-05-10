<?php
 require_once 'cardEventos.php';
function generateGrid($listEventos)
{
  $grid = "";

  foreach ($listEventos as $indice => $evento) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($evento);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

 ?>
