<?php
 require_once  ABSPATH.'model/turma.php';


function createCard($turma)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$turma->getIdTurma()}</td>\n"; //imprime o id do turma
  $card = $card . "<td>{$turma->getNome()}</td>\n"; //imprime o Nome do turma
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_turma&id_turma=".$turma->getIdTurma()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
  $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}
function createSelectTurma($turma){
    $card = "<option value={$turma->getIdTurma()}>{$turma->getNome()}</option>";
    return $card;
}
 ?>
