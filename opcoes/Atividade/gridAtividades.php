<?php
 require_once 'cardAtividades.php';
function generateGrid($listatividades){
  $grid = "";

  foreach ($listatividades as $indice => $atividade) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($atividade);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}

function generatedSelectSala($listaSalas){
  $option = "<option value=''>Selecione</option>";
  foreach($listaSalas as $indice => $sala){
    $option .= createSelectSala($sala);
  }
  return $option;
}

function generatedSelectPalestrante($listaPalestrantes){
  $option = "";
  foreach($listaPalestrantes as $indice => $palestrante){
    $option .= createSelectPalestrante($palestrante);
  }
  return $option;
}

 ?>
