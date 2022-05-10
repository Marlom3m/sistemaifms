<?php
 require_once 'cardPalestrantes.php';
function generateGrid($listpalestrantes)
{
  $grid = "";

  foreach ($listpalestrantes as $indice => $palestrante) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($palestrante);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

 ?>
