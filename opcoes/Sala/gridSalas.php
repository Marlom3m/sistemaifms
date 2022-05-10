<?php
 require_once 'cardSalas.php';
function generateGrid($listSalas)
{
  $grid = "";

  foreach ($listSalas as $indice => $sala) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($sala);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

 ?>
