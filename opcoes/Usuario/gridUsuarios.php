<?php

 require_once 'cardUsuarios.php';

function generateGrid($listUsuarios)
{
  $grid = "";

  foreach ($listUsuarios as $indice => $usuario) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($usuario);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

 ?>
