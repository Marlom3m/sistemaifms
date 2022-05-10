<?php
 require_once 'cardTurmas.php';
function generateGrid($listTurmas)
{
  $grid = "";

  foreach ($listTurmas as $indice => $turma) {

  //  $grid = $grid . "<div class='container-fluid '> \n";
      $grid = $grid . createCard($turma);
  //  $grid = $grid . "</div> \n";

  }
  $grid = $grid . "</tbody>\n";
  $grid = $grid . "</table>\n";
    return $grid;
}
function generatedSelectTurma($listaTurmas){
  $option = "<option value=''>Selecione</option>";
  foreach($listaTurmas as $indice => $turma){
    $option .= createSelectTurma($turma);
  }
  return $option;
}

 ?>
