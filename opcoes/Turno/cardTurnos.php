<?php
 require_once  ABSPATH.'model/turno.php';


function createCard($turno)
{
  // colocar a tabela aq

  $card = "<tr>";
  $card = $card . "<td>{$turno->getIdTurno()}</td>\n"; //imprime o id do turno
  $card = $card . "<td>{$turno->getNome()}</td>\n"; //imprime o Nome do turno
  $card = $card . "<td class='actions text-left'>\n";
  $card = $card . "<a href='?page=editar_turno&id_turno=".$turno->getIdTurno()."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>\n";
  $card = $card . "<a href='' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='deletar()'>\n";
  $card = $card . "<i class='fa fa-trash'></i> Excluir \n";
  $card = $card . "</a>\n";
  $card = $card . "</td>\n";
  $card = $card . "</tr>\n";

  return $card;
}

 ?>
