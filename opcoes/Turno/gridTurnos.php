<?php
 require_once 'cardTurnos.php';
function generateGrid($listTurnos)
{
  $grid = "";

  foreach ($listTurnos as $indice => $turno) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($turno);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

 ?>
